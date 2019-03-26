<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>URL Shorter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row justify-content-md-center">
            <form id="ajax_form" action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">URL</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="actualUrl" aria-describedby="emailHelp" placeholder="Enter URL">
            </div>
            <button type="button" id="btn" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="row justify-content-md-center">
        <h2>Short URL: <span id="result_form"></span></h2>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
        $("#btn").click(
            function(){
                sendAjaxForm('result_form', 'ajax_form', 'api/v1/Urlshortner/make_url_short');
                return false;
            }
        );
    });

    function sendAjaxForm(result_form, ajax_form, url) {
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: $("#" + ajax_form).serialize(),
            success: function (response) {
                result = $.parseJSON(response);
                $('#result_form').html(result.short_url);
            },
            error: function (response) {
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    }
</script>
</body>
</html>