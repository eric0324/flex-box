<?php

namespace App\Admin\Controllers;

use App\Flex;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class FlexController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Flex message')
            ->description('Flex message 清單')
            ->body($this->grid());

    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Flex message')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('編輯 Flex message')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('建立 Flex message')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Flex);

        $grid->id('Id');
        $grid->name('標題');
        $grid->demo_image('預覽圖')->image();
        $grid->verify_at('驗證時間');
        $grid->created_at('建立時間');
        $grid->updated_at('更新時間');

        $grid->model()->orderBy('id', 'desc');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Flex::findOrFail($id));

        $show->id('Id');
        $show->name('標題');
        $show->description('描述');
        $show->demo_image('預覽圖')->image();
        $show->demo_code('Chatbot 預覽碼');
        $show->bot_id('Chatbot ID');
        $show->shell('Shell');
        $show->java('JAVA');
        $show->ruby('Ruby');
        $show->golang('Go');
        $show->php('PHP');
        $show->perl('Perl');
        $show->python('Python');
        $show->nodejs('NodeJS');
        $show->verify_at('驗證時間');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Flex);

        $form->text('name', '標題')->rules('required');
        $form->text('description', '描述');
        $form->text('demo_image', '預覽圖');
        $form->text('demo_code', 'Chatbot 預覽碼');
        $form->text('bot_id', 'Chatbot ID');
        $form->text('shell', 'Shell');
        $form->datetime('verify_at', '驗證時間');

        return $form;
    }
}
