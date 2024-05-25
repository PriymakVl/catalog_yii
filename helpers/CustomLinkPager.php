<?php
namespace app\helpers;
// namespace app\widgets;

use yii\widgets\LinkPager;

class CustomLinkPager extends LinkPager
{
    protected function createPageButton($label, $page, $class, $disabled, $active)
    {
        if ($disabled) {
            return '<li class="' . $class . ' disabled"><span>' . $label . '</span></li>';
        }

        $options = ['class' => $class];
        if ($active) {
            $options['class'] .= ' active';
        }

        return '<li class="' . $options['class'] . '">' . \yii\helpers\Html::a($label, $this->pagination->createUrl($page)) . '</li>';
    }

    protected function createPrevButton($label, $page, $disabled, $currentPage, $pageCount)
    {
        if ($currentPage <= 0) {
            $page = $pageCount - 1; // Go to the last page if current page is the first one
        }
        return $this->createPageButton($label, $page, $this->prevPageCssClass, false, false);
    }

    protected function createNextButton($label, $page, $disabled, $currentPage, $pageCount)
    {
        if ($currentPage >= $pageCount - 1) {
            $page = 0; // Go to the first page if current page is the last one
        }
        return $this->createPageButton($label, $page, $this->nextPageCssClass, false, false);
    }

    public function run()
    {
        $pageCount = $this->pagination->getPageCount();
        $currentPage = $this->pagination->getPage();

        if ($pageCount < 2) {
            return;
        }

        $buttons = [];

        // prev page
        $buttons[] = $this->createPrevButton($this->prevPageLabel, $currentPage - 1, $currentPage <= 0, $currentPage, $pageCount);

        // internal pages
        list($beginPage, $endPage) = $this->getPageRange();
        for ($i = $beginPage; $i <= $endPage; ++$i) {
            $buttons[] = $this->createPageButton($i + 1, $i, null, false, $i == $currentPage);
        }

        // next page
        $buttons[] = $this->createNextButton($this->nextPageLabel, $currentPage + 1, $currentPage >= $pageCount - 1, $currentPage, $pageCount);

        echo \yii\helpers\Html::tag('ul', implode("\n", $buttons), $this->options);
    }
}

// вывод в html

use app\widgets\CustomLinkPager;
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item', // Представление для отображения каждого элемента
    'pager' => [
        'class' => CustomLinkPager::class,
    ],
]);


