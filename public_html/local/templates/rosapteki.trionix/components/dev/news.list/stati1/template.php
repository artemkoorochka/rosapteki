<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$arParams["ROW_COLS"] = 3;
?>
<div class="row mnm1">
    <?
    foreach($arResult["ITEMS"] as $k=>$arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        if($k > 0){
            if($k%$arParams["ROW_COLS"] == 0){
                echo '</div><div class="row mnm1">';
            }
        }
    ?>

        <div class="col text-center border border-primary mm1" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if(isset($arItem["PREVIEW_PICTURE"]["SRC"])){?><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"><?}?>
        </div>

    <?endforeach;?>
</div>
