// alert('test');
// $('#myForm').click(function () {
// 	alert('bla');
// })


$('#submitForm').click(function (){
	var myData = $('#myForm').serialize();
	$.ajax({
		type: 'post',
		url: 'php/form.php',
		data: myData,
		success: function (response) {
                    var jsonResponse = JSON.parse(response);
                    
                    if($('input[name=newOrEdit]').val() == 'new'){
                        $('#myTable tr:last').after('<tr class="tableRow"><td> data-contactId="' + jsonResponse.id + '"'+
                                jsonResponse.companyName + '</td><td>' +
                                jsonResponse.companyAddress + '</td><td>' + 
                                jsonResponse.contactName + '</td><td>' +
                                jsonResponse.contactPhone + '</td><td>' +
                                jsonResponse.contactNotes + '</td>' +
                                ' <td class="editBtn " >'+
                                 '<button class="btn btn-warning" data-id="' + jsonResponse.id + '"'+
                                                                'data-cName="' + jsonResponse.companyName + '"'+
                                                                'data-cAddress="' + jsonResponse.companyAddress + '"'+
                                                                'data-name="' + jsonResponse.contactName + '"'+
                                                                'data-phone="' + jsonResponse.contactPhone + '"'+
                                                                'data-notes="' + jsonResponse.contactNotes + '"'+
                                            '>EDIT</button> </td></tr>');
                                    console.log(jsonResponse);
                    } else {
//                                    console.log(jsonResponse);
                       $('input[name=newOrEdit] :nth-child(1)').val(jsonResponse.companyName);
                       $('input[name=newOrEdit] :nth-child(2)').val(jsonResponse.companyAddress);
                    }
		}

	})

});

$('#companies').change(function(){
    $('input[name=companyAddress]').val($('option:selected').data('address'));
});

$('.editBtn button').click(function(){
    $('#myModal').modal();
    $('input[name=contactId]').val($(this).data('id'));
    $('input[name=companyName]').val($(this).data('cname'));
    $('input[name=companyAddress]').val($(this).data('caddress'));
    $('input[name=contactName]').val($(this).data('name'));
    $('input[name=contactPhone]').val($(this).data('phone'));
    $('input[name=notes]').val($(this).data('notes'));
    $('input[name=newOrEdit]').val($(this).parent().data('contactid'));
    
//    console.log($(this).parent());
});

$('#addCompanyBtn').click(function(){
    
$('#addCompany').toggleClass('displayNone');
    
});