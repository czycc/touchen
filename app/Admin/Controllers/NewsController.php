<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\News;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NewsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(News::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('title', '标题');
            $grid->column('category_id', '类别')->category();
            $grid->column('image', '头图')->image();
            $grid->column('description', '文章描述');
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(News::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '标题')->rules('required|max:40');
            $form->text('description', '文章简介')->rules('required');
            $form->select('category_id', '分类')->options(function () {
                $categories = Category::select(['id', 'category'])
                    ->get()
                    ->mapWithKeys(function ($item) {
                    return [$item['id'] => $item['category']];
                });
                return $categories->all();
            })->rules('required');
            $form->image('image', '头图(比例450*300)')
                ->move('images', uniqid() . '.jpg')->fit(450,300)->rules('required');
            $form->editor('text', '文章内容')->rules('required');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
