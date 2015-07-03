<script type="text/javascript">
	$(document).ready ( function () {
		$('#files').addClass('active');
		$('#addclaim').removeClass('active');

        $('.fr').hide();
        $('#list-style').addClass('btn-success');

		$('.folder').hover(function() {
			//$('.menu').css( { 'display':'block' }, { 'display':'none'});
		})

        $('#list-style').click( function() {
            $(this).addClass('btn-success');
            $('#folder-style').removeClass('btn-success');

            $('.list').slideDown();
            $('.fr').hide();
        });

        $('#folder-style').click( function() {
            $(this).addClass('btn-success');
            $('#list-style').removeClass('btn-success');

            $('.list').slideUp();
            $('.fr').fadeIn();
        })


		$('#folder_menu').click( function() {
			$('#body').css({ 'background': '#E7E7E7'});
			$('.folder_menu').fadeIn(500);
		})

		$('#closefoldermenu').click( function() {
			$('.folder_menu').fadeOut(500);
			$('#body').css({ 'background': ''});
		})



		$('#addfolder').click( function() {
			var name = $('#foldername').val();
			
			$.ajax({
				type: "POST",
				url: "application/views/claims/ajax/addfolder.php",
				data: 'name='+name,
				success: function(result) {
	               $('.folder_menu').fadeOut(1000);
				   $('#body').css({ 'background': ''});
                    window.location.reload()
				}
			});
		});



        /// Active Trash;

       $('#checkall').click( function() {
            if ($(this).is(':checked')) {
                $("input[type='checkbox']").prop('checked', true);
                $('#trash').addClass('btn-danger');
            }
            else {
                $("input[type='checkbox']").prop('checked', false);
                $('#trash').removeClass('btn-danger');
            }
       });

       function checker() {
           if ($("input[type='checkbox']").is(':checked')) {
               $('#trash').addClass('btn-danger');
               $('#trash').prop('disabled', false);
           }
           else {
               $('#trash').removeClass('btn-danger');
               $('#trash').prop('disabled', true);
           }
       }

        setInterval(checker, 100);


        $('#trash').click( function() {
            var conf = confirm('Вы Уверены что хотите удалить ?');

            if (conf == true)
            {
                var inputs = new Array();
                var i = 0;

                $("input[type='checkbox']").each( function() {
                    if ($(this).is(':checked')) {
                        inputs[i] = $(this).val();
                        i++;
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "application/views/claims/ajax/delfolders.php",
                    data: {
                        'inputs[]': inputs
                    },
                    success: function(result) {
                        window.location.reload();
                    }
                });
            }
            else
                return false;

        });

        var id ;

        $("table button").click( function() {
                id = $(this).attr("id");
                $('#body').css({ 'background': '#E7E7E7'});
                $('.folder_menu1').fadeIn(500);
                $('#foldername1').val($(this).attr("name"));
        });

        $('#closemenu').click( function() {
            $('.folder_menu1').fadeOut(500);
            $('#body').css({ 'background': ''});
        });

        $('#changefoldername').click( function() {
            foldername = $('#foldername1').val();

            $.ajax({
                type: "POST",
                url: "application/views/claims/ajax/editfolder.php",
                data: {
                    'id': id,
                    'name': foldername
                },
                success: function(result) {
                    window.location.reload();
                }
            });
        });

	});
</script>
<div>
    <!-- Modal -->

<div class="folder_menu">
        <div class="col-lg-12">
            <div class="row">
                <div class="alert alert-info"><b>Добавить папку</b><div id="closefoldermenu" class="pull pull-right"><span class="glyphicon glyphicon-remove"></span> </div></div>
            </div>

            <div class="form">
                <div class="form-group">
                    <label for="">Введите название папки:</label>
                    <input type="text" class="form-control" id="foldername" placeholder="Введите название папки">
                </div>
                <div class="form-group">
                    <button class="pull-right btn btn-primary btn-md" id="addfolder">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT FOLDER NAME -->
    <div class="folder_menu1">
        <div class="col-lg-12">
            <div class="row">
                <div class="alert alert-info"><b>Редактировать папку</b><div id="closemenu" class="pull pull-right"><span class="glyphicon glyphicon-remove"></span> </div></div>
            </div>

            <div class="form">
                <div class="form-group">
                    <label for="">Название папки:</label>
                    <input type="text" class="form-control" id="foldername1" >
                </div>
                <div class="form-group">
                    <button class="pull-right btn btn-primary btn-md" id="changefoldername">Изменить</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
		<div class="alert alert-info"><b>Файловая система </b>
        </div>

</div>
<div class="row">
	<? if (count($category) == 0) { ?>
		<div class="col-lg-12">
			<div class="bs-callout bs-callout-warning">Вы еще не добавили никаких категорий, для того чтобы добавить <a href="?option=addcategory">перейдите по ссылке</a></div>
		</div>
	<? } else { ?>

<div class="col-lg-12">
        <div class="pull pull-left">
            <button id="folder_menu" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Создать папку</button>
            <button class="btn btn-sm" id="trash"><span class="glyphicon glyphicon-trash"></span></button>
        </div>
        <div class="pull pull-right">
            <button class="btn btn-sm" id="folder-style"><span class="glyphicon glyphicon-folder-open"></span></button>
            <button class="btn btn-sm" id="list-style"><span class="glyphicon glyphicon-align-justify"></span></button>
        </div>
</div>
<div class="col-lg-12">
    <hr/>
</div>

<div class="list" id="list-form">
	<table class="table table-hovered">
		<tr>
			<th>#</th>
			<th><input type="checkbox" id="checkall">&nbsp;&nbsp; Название категории / папки</th>
			<th>Кол-во документов</th>
			<th>Общий размер папки</th>
			<th>Последний добавленный документ</th>
            <th></th>
		</tr>
		<? for($i = 0; $i < count($category); $i++) { $n = $i + 1; ?>
			<tr class="success">
				<td ><a href="?option=viewcat&id=<?=$category[$i]->id; ?>" ><?=$n; ?></a></td>
				<td ><input type="checkbox" value="<?=$category[$i]->id; ?>"> &nbsp;&nbsp; <a href="?option=viewcat&id=<?=$category[$i]->id; ?>"><span class="glyphicon glyphicon-folder-close"></span> <?=$category[$i]->name; ?></a></td>
				<td align="center"><a href=""><?=getCountFiles($category[$i]->id); ?></a></td>
				<td><a href=""><?=sizeofFolder($category[$i]->id) / 1024; ?> МБ</a></td>
				<td><?=getDateofLastFile($category[$i]->id); ?></td>
                <td>
                    <button class="btn btn-xs btn-info" name="<?=$category[$i]->name; ?>" id="<?=$category[$i]->id; ?>" class="editfolder">
                         <input type="hidden" value="<?=$category[$i]->id; ?>" id="folderid">
                         <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </td>
			</tr>
		<? } ?>
	</table>
	<? } ?>
</div>
<div class="fr">
	<div class="row">
		<div class="col-lg-12 file">
			<ul class="nav navbar-nav">
				<? for($i = 0; $i < count($category); $i++)  { ?>
				<section class="folder">
					<a href="?option=viewcat&id=<?=$category[$i]->id; ?>">
						<li ><?=$category[$i]->name; ?></li>
					</a>
					<button class="btn btn-xs btn-danger menu" >Удалить папку</button>
				</section>
				<? } ?>
			</ul>
		</div>
	</div>
</div>
</div>
