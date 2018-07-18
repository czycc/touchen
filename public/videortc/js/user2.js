var CONFIG = {
  appKey: 'de501cc7e88310de9f95816237aba148',
  account: 'test2',  // 用户账号
  token: '123456',  // 用户密码
}
// 加载插件
NIM.use(WebRTC)
console.log(WebRTC)

// 初始化SDK
function SDKBridge () {
  this.nim = null
  this.init()
}

SDKBridge.prototype = {
  constructor: SDKBridge,
  init: function () {
    this.nim = NIM.getInstance({
      // debug: true,
      appKey: CONFIG.appKey,
      account: CONFIG.account,
      token: CONFIG.token,
      onconnect: this.onConnect,
      onwillreconnect: this.onWillReconnect,
      ondisconnect: this.onDisconnect,
      onerror: this.onError
    });
  },
  onConnect: function () {
    console.log('连接成功')
    new WebRTCSdk()
  },
  onWillReconnect: function (obj) {
    // 此时说明 SDK 已经断开连接, 请开发者在界面上提示用户连接已断开, 而且正在重新建立连接
    console.log('即将重连')
    console.log(obj.retryCount)
    console.log(obj.duration)
  },
  onDisconnect: function (error) {
    // 此时说明 SDK 处于断开状态, 开发者此时应该根据错误码提示相应的错误信息, 并且跳转到登录页面
    console.log('丢失连接');
    console.log(error);
    if (error) {
      switch (error.code) {
        // 账号或者密码错误, 请跳转到登录页面并提示错误
        case 302:
          break;
        // 重复登录, 已经在其它端登录了, 请跳转到登录页面并提示错误
        case 417:
          break;
        // 被踢, 请提示错误后跳转到登录页面
        case 'kicked':
          break;
        default:
          break;
      }
    }
  },
  onError: function (error) {
    console.log(error)
  }
}

var sdk = new SDKBridge()

// 初始化音视频

function WebRTCSdk () {
  this.webrtc = null
  this.init()
  this.initRoom()
  this.initWebRTCEvent()
}
WebRTCSdk.prototype = {
  constructor: WebRTCSdk,
  init: function () {
    this.webrtc = WebRTC.getInstance({
      nim: sdk.nim,
      container: document.getElementById('container'),
      remoteContainer: document.getElementById('remoteContainer'),
    })
  },
  initRoom () {
    var slef = this
    var sessionConfig = {
      videoQuality: WebRTC.CHAT_VIDEO_QUALITY_720P,
      videoFrameRate: WebRTC.CHAT_VIDEO_FRAME_RATE_25,
      highAudio: true,
    }
    this.webrtc.joinChannel({
      channelName: 'room', //必填
      type: WebRTC.NETCALL_TYPE_VIDEO,
      sessionConfig: sessionConfig
    }).then(function(obj) {
      slef._initLocalVideo()
    }).catch(function (err) {
      if (err.event.code === 404) {
        slef._createChannel()
      }
    })
  },
  initWebRTCEvent: function () {
    // 是否被叫中
    this.beCalling = false
    // 呼叫类型
    this.type = null
    // 被叫信息
    this.beCalledInfo = null
    // 是否正忙
    this.busy = false
    // 收到用户媒体流
    this.webrtc.on('remoteTrack', this._remoteTrack.bind(this))
    // 设备新增
    this.webrtc.on('deviceAdd',this._deviceAdd.bind(this))
    // 设备移除
    this.webrtc.on('deviceRemove', this._deviceRemove)
  },
  _createChannel () {
    var slef = this
    this.webrtc.createChannel({
      channelName: 'room', //必填
      webrtcEnable: true // 是否支持WebRTC方式接入，可选，默认为不开启
    }).then(function (obj) {
      slef.initRoom()
    })
  },
  _initLocalVideo () {
    var webrtc = this.webrtc
    var promise = Promise.resolve()
    promise.then(function () {
      // 开启麦克风
      return webrtc.startDevice({
        type: WebRTC.DEVICE_TYPE_AUDIO_IN
      }).catch(function(err) {
        console.log('启动麦克风失败')
        console.error(err)
      })
    })
    .then(function() {
      // 设置采集音量0 - 255
      webrtc.setCaptureVolume(255)
      // 开启摄像头
      return webrtc.startDevice({
          type: WebRTC.DEVICE_TYPE_VIDEO,
          width: 1080,
          height: 720
        })
      .catch(function(err) {
        console.log('启动摄像头失败')
        console.error(err)
      })
    })
    .then(function() {
      // 设置本地预览画面大小
      webrtc.setVideoViewSize({
        width: 216,
        height: 144,
        cut:true
      })
      // 本地video添加
      //webrtc.startLocalStream()
    })
    .then(function() {
      // 设置互动者角色
      webrtc.changeRoleToPlayer()
      // 开启RTC连接
      console.log("开始webrtc")
      webrtc.startRtc()
    })
    .then(function() {
      console.log("webrtc连接成功")
    })
    .catch(function(err) {
      console.log('发生错误, 挂断通话')
      console.log(err)
      webrtc.hangup()
    })
  },
  _remoteTrack (obj) {
    console.log('收到远程轨道信息', obj);
    // 播放对方声音
    this.webrtc.startDevice({
      type: WebRTC.DEVICE_TYPE_AUDIO_OUT_CHAT
    }).catch(function(err) {
      console.log('播放对方的声音失败')
      console.error(err)
    })
    // 预览对方视频画面
    this.webrtc.startRemoteStream()
    var remoteContainer = document.querySelector('#remoteContainer div')
    var remoteContainerVideo = document.querySelector('#remoteContainer div video')
    var removeP = document.querySelector('#remoteContainer p')
    var width = 1080
    var height = 720
    remoteContainer.style.width = width + 'px'
    remoteContainer.style.height = height + 'px'
    remoteContainerVideo.style.width = width + 'px'
    remoteContainerVideo.style.height = height + 'px'
    removeP.innerHTML = ''
  },
  _clear () {
    // 停止本地视频预览
    this.webrtc.stopLocalStream();
    // 停止对端视频预览
    this.webrtc.stopRemoteStream();
    // 停止设备麦克风
    this.webrtc.stopDevice(WebRTC.DEVICE_TYPE_AUDIO_IN);
    // 停止设备摄像头
    this.webrtc.stopDevice(WebRTC.DEVICE_TYPE_VIDEO);
    // 停止播放本地音频
    this.webrtc.stopDevice(WebRTC.DEVICE_TYPE_AUDIO_OUT_LOCAL);
    // 停止播放对端音频
    this.webrtc.stopDevice(WebRTC.DEVICE_TYPE_AUDIO_OUT_CHAT);
  },
  _deviceAdd (devices) {
    console.log('新增设备列表', devices)
    // this._clear()
    this.initLocalVideo()
  },
  _deviceRemove (devices) {
    alert('设备被移除，请检查设备是否连接正常')
    console.log('移除设备列表', devices)
  }
}
