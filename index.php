<?php include_once 'php/start.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Leyb - AJAX form</title>
	<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		Welcome to your websystem!
	</header>

	<div id="mainDiv">
            <div class="buttonsDiv">
                <button class="createMore btn btn-primary btn-lg" data-toggle="modal"
                        data-target="#myModal">Create Contact</button>
                <button id="addCompanyBtn" class="createMore btn btn-info btn-lg">Add company name</button>
                <form id="addCompany" class="displayNone">
                    <input id="companyName" name="companyName" class=" btn btn-info">
                    <input type="submit" value="Add!" class=" btn btn-info">
                </form>
            </div>
                <table id="myTable" class="table table-striped table-bordered">
				<tr class="tableRow">
					<th>Company Name</th>
					<th>Company Address</th>
					<th>Contact Name</th>
					<th>Contact Phone</th>
					<th>Notes</th>
					<th>ACTIONS</th>
				</tr>
                                <?php
                                foreach($row as $line): ?>
                                        <tr class="tableRow" data-contactId="<?=$line['id']?>">
                                                <td><?=$line['companyName']?></td>
                                                <td><?=$line['companyAddress']?></td>
                                                <td><?=$line['name']?></td>
                                                <td><?=$line['phone']?></td>
                                                <td><?=$line['notes']?></td>
                                                <td class="editBtn " >
                                                    <button class="btn btn-warning" data-id="<?=$line['id'] ?>" 
                                                            data-cName="<?=$line['companyName']?>"
                                                            data-cAddress="<?=$line['companyAddress']?>"
                                                            data-name="<?=$line['name']?>"
                                                            data-phone="<?=$line['phone']?>"
                                                            data-notes="<?=$line['notes']?>"
                                                            >EDIT</button>
                                                    <button class="btn btn-danger">X</button>
                                                </td>
                                        </tr>
                                <?php endforeach;?>
		</table>
	</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
		<form action="#" class="flexCol" id="myForm">
                    <input type="hidden" name="newOrEdit" value="new">
                    <input type="hidden" name="contactId" value="">
                    <select name="companyName" id="companies">
                            <?php foreach($row as $line): ?>
				<option data-address=" <?= $line['companyAddress'] ?>"> <?= $line['companyName'] ?></option>
                            <?php endforeach;?>
			</select>
                        
                    <input type="text" name="companyAddress" class="formItems" placeholder="Company's Address">
                    <input type="text" name="contactName"  class="formItems" placeholder="Contact's Name">
                    <input type="text" name="contactPhone" class="formItems" placeholder="Contact's Phone">
                    <textarea type="text" name="contactNotes" class="formItems" placeholder="Notes"></textarea>
		</form>			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitForm">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- jquery -->
        <script src="js/jquery-3.1.1.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js""></script>
	<script src='js/global.js'></script>
	<!-- <script src='js/global.min.js'></script> -->
</body>
</html>