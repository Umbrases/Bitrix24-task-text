<?
$arrTaskUrl = explode('task/view/', $_SERVER['REDIRECT_URL']);
$taskId = intval(preg_replace('/[^0-9]+/', '', $arrTaskUrl[1]), 10);


if (CModule::IncludeModule("tasks"))
{
    $rsTask = CTasks::GetByID($taskId, false);

    if ($arTask = $rsTask->GetNext())
    {
        $dealId = preg_replace("/\bD_/", "", $arTask["UF_CRM_TASK"][0]);


        $arFilter = array(
            "ID"=>$dealId, //выбираем определенную сделку по ID
            "CHECK_PERMISSIONS"=>"N" //не проверять права доступа текущего пользователя
        );
        $arSelect = array(
            "ID",
            "UF_CRM_1565694387", //пользовательское свойство
        );
        $deal = CCrmDeal::GetList(Array(), $arFilter, $arSelect)->Fetch();

        //var_dump($res);
        if($deal['UF_CRM_1565694387'] == 1397){
            $arJsConfig = array(
                'custom_main' => array(
                    'js' => "/local/js/task.js",
                )
            );
            foreach ($arJsConfig as $ext => $arExt) {
                \CJSCore::RegisterExt($ext, $arExt);
            }

            CUtil::InitJSCore(array('custom_main'));
        }
    }

}
