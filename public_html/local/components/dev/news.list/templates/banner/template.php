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
?>

		<div id="slides">
			
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

							$res = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
							if($ar_res = $res->GetNext()) {
								$caption = $ar_res['NAME'];
								$code = $ar_res['CODE'];
							}
						
					?>
			    
				<div class="slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <?if(isset($arItem["PROPERTIES"]["BANNER"]["VALUE"])){?><img src="<?=CFile::GetPath($arItem["PROPERTIES"]["BANNER"]["VALUE"]);?>" alt="<?=$arItem["NAME"];?>"><?}?>
                    <a href="/stati/<?=$code;?>/<?=$arItem['CODE']?>/" class="caption">
                        <span><?=$caption;?></span>
                        <h5><?=$arItem["NAME"];?></h5>
                        <?=$arItem["PREVIEW_TEXT"];?>
					</a>
                </div>
						
                <?endforeach;?>
		</div>
		<div class="clear"></div>