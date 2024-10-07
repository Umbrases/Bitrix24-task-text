BX.ready(function () {
    console.log(11322);
    let user = BX.message('USER_ID');// получим текущего пользователя
    let task = getTaskID();

    if ( task ) { // will return true

        let checkExist = setInterval(function() {

            clearInterval(checkExist);

            showButtons( task, user );

        }, 1);

    }

});

function getTaskID () {

    var entity_xml_id = document.getElementsByName('ENTITY_XML_ID');

    if ( typeof entity_xml_id === 'object' ) {

        if ( entity_xml_id.length > 0 ) {
            return Number(entity_xml_id[0].value.split("_").pop());
        } else {
            return 0
        }
    }
}

function showButtons( task, user ) {

    if ( task ) {

        let fd = new FormData();
        fd.append('task', task);
        fd.append('user', user);

        let buttonBar = document.querySelector('table.task-detail-properties-layout > tbody > tr > td.task-detail-property-value > table >tbody > tr > td.field_crm_entity > a');

        let innerHTML = buttonBar.innerHTML;

        if ( buttonBar !== null ) {
            let td = buttonBar.getElementsByTagName('td');


            buttonBar.innerHTML += "" +
                "<text>VIP</text>"
        }
    }

};