$(document).ready(function(){
  
  // On page load: datatable
  var table_companies = $('#table_companies').dataTable({
	"ajax": "ajax_2.php?type=newsinfo",
    "columns": [
      { "data": "ten_tin_tuc"},
      { "data": "noi_dung_chi_tiet"},
      { "data": "noi_dung_tom_gon" },
	  { "data": "thoi_gian_dang" },
	  { "data": "ma_tai_khoan" },
	  { "data": "ma_the_loai_chi_tiet" },
	  { "data": "SL_nguoi_doc" },
      { "data": "functions", "sClass": "functions"}
    ],
    "aoColumnDefs": [
      { "bSortable": false, "aTargets": [-1] }
    ],
	
    "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
    "oLanguage": {
      "oPaginate": {
        "sFirst":       " ",
        "sPrevious":    " ",
        "sNext":        " ",
        "sLast":        " ",
      },
      "sLengthMenu":    "Số trường mỗi trang : _MENU_",
      "sInfo":          "Tổng có _TOTAL_ trường (từ _START_ đến _END_)",
      "sInfoFiltered":  "(lọc từ _MAX_ trường)"
    }
  });
  
  // On page load: form validation
  jQuery.validator.setDefaults({
    success: 'valid',
    rules: {
      fiscal_year: {
        required: true,
        min:      2000,
        max:      2025
      }
    },
    errorPlacement: function(error, element){
      error.insertBefore(element);
    },
    highlight: function(element){
      $(element).parent('.field_container').removeClass('valid').addClass('error');
    },
    unhighlight: function(element){
      $(element).parent('.field_container').addClass('valid').removeClass('error');
    }
  });
  var form_company = $('#form_company');
  form_company.validate();

  // Show message
  function show_message(message_text, message_type){
    $('#message').html('<p>' + message_text + '</p>').attr('class', message_type);
    $('#message_container').show();
    if (typeof timeout_message !== 'undefined'){
      window.clearTimeout(timeout_message);
    }
    timeout_message = setTimeout(function(){
      hide_message();
    }, 5000);
  }
  // Hide message
  function hide_message(){
    $('#message').html('').attr('class', '');
    $('#message_container').hide();
  }

  // Show loading message
  function show_loading_message(){
    $('#loading_container').show();
  }
  // Hide loading message
  function hide_loading_message(){
    $('#loading_container').hide();
  }

  // Show lightbox
  function show_lightbox(){
    $('.lightbox_bg').show();
    $('.lightbox_container').show();
  }
  // Hide lightbox
  function hide_lightbox(){
    $('.lightbox_bg').hide();
    $('.lightbox_container').hide();
  }
  // Lightbox background
  $(document).on('click', '.lightbox_bg', function(){
    hide_lightbox();
  });
  // Lightbox close button
  $(document).on('click', '.lightbox_close', function(){
	$('#side-menu').show();
    hide_lightbox();
  });
  // Escape keyboard key
  $(document).keyup(function(e){
    if (e.keyCode == 27){
      hide_lightbox();
    }
  });
  
  // Hide iPad keyboard
  function hide_ipad_keyboard(){
    document.activeElement.blur();
    $('input').blur();
  }

  // Add company button
  $(document).on('click', '#add_company', function(e){
    e.preventDefault();
	$('#side-menu').hide();
    $('.lightbox_content h2').text('Thêm tin tức');
    $('#form_company button').text('Thêm tin tức');
    $('#form_company').attr('class', 'form add');
    $('#form_company').attr('data-id', '');
    $('#form_company .field_container label.error').hide();
    $('#form_company .field_container').removeClass('valid').removeClass('error');
    $('#form_company #news_name').val('');
    $('#form_company #news_nddetail').val('');
    $('#form_company #news_ndsm').val('');
    $('#form_company #news_time').val('');
	// lấy mã tài khoản & thể loại chi tiết
	var requestt = $.ajax({
		
		url:          'ajax_2.php',
        cache:        false,
        data:         {
				type : 'getinfo',
				
			},
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get',
		success : function(output){
			var html_mtk = '';
			var html_ntk = '';
			var html_mtl = '';
			if(output.result == "success")
			{
				$.each(output.mtk,function (indx,val){
					
					html_mtk += "<option value='"+ val +"'>"+val +"</option>";
					
					});
					$('#news_mtk').html(html_mtk);
				
				}
				$.each(output.mtl,function (indx,val){
					

					html_mtl += "<option value='"+ val +"'>"+val +"</option>";
					
					});
					$('#news_mtl').html(html_mtl);
				

			
									}	
		
		});

    show_lightbox();
  });

  // Add company submit form
  $(document).on('submit', '#form_company.add', function(e){
    e.preventDefault();
    // Validate form
	//console.log(form_data);
    if (form_company.valid() == true){
      // Send company information to database
      hide_ipad_keyboard();
      hide_lightbox();
      show_loading_message();
      var request   = $.ajax({
        url:          'ajax_2.php',
        cache:        false,
        data:         {
				type : 'add_news',
				ten_tin_tuc: $('#news_name').val(),
				noi_dung_chi_tiet: $('#news_nddetail').val(),
				noi_dung_tom_gon : $('#news_ndsm').val(),
				thoi_gian_dang : $('#news_time').val(),
				ma_tai_khoan : $( "#news_mtk option:selected" ).val(),
				ma_the_loai_chi_tiet : $( "#news_mtl option:selected" ).val()
				
			},
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get',
		success : function(output){
			
			if (output.result == 'success'){
          // Reload datable
		  //console.log(output.data);
		  $('#side-menu').show();
          table_companies.api().ajax.reload(function(){
            hide_loading_message();
            var company_name = $('#news_name').val();
            show_message("Bản tin '" + company_name + "' được thêm thành công", 'success');
          }, true);
        } else {
			$('#side-menu').show();
          hide_loading_message();
          show_message('Add request failed', 'error');
        }
			
			},
			fail : function(jqXHR, textStatus){
				$('#side-menu').show();
				hide_loading_message();
        		show_message('Add request failed: ' + textStatus, 'error');
				}
      });
      //request.done(function(output){
        
      //});
      //request.fail(function(jqXHR, textStatus){
       //hide_loading_message();
        //show_message('Add request failed: ' + textStatus, 'error');
     // });
    }
  });

  // Edit company button
  $(document).on('click', '.function_edit a', function(e){
    e.preventDefault();
    // Get company information from database
    show_loading_message();
    var id      = $(this).data('id');
	//console.log(id);
    var request = $.ajax({
      url:          'ajax_2.php',
      cache:        false,
	  data :{
		  type : 'get_news',
		  id : id
		  },
      dataType:     'json',
      contentType:  'application/json; charset=utf-8',
      type:         'get'
    });
    request.done(function(output){
      if (output.result == 'success'){

		 //console.log(output.data);
		
        $('.lightbox_content h2').text('Chỉnh sửa tin tức');
        $('#form_company button').text('Sửa tin tức');
        $('#form_company').attr('class', 'form edit');
        $('#form_company').attr('data-id', id);
        $('#form_company .field_container label.error').hide();
        $('#form_company .field_container').removeClass('valid').removeClass('error');
        $('#form_company #news_name').val(output.data[0].ten_tin_tuc);
        $('#form_company #news_nddetail').val(output.data[0].noi_dung_chi_tiet);
        $('#form_company #news_ndsm').val(output.data[0].noi_dung_tom_gon);
		$('#form_company #news_time').val(output.data[0].thoi_gian_dang);
		var data_mtk = output.data[0].ma_tai_khoan;
		var data_mtl = output.data[0].ma_the_loai_chi_tiet;
		var requestt = $.ajax({
		
		url:          'ajax_2.php',
        cache:        false,
        data:         {
				type : 'getinfo',
				
			},
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get',
		success : function(output){
			var html_mtk = '';
			var html_ntk = '';
			var html_mtl = '';
			if(output.result == "success")
			{
				$.each(output.mtk,function (indx,val){
					
					html_mtk += "<option value='"+ val +"'";
					if(data_mtk == val) html_mtk+= "selected";
					html_mtk += ">"+val +"</option>";
					
					});
					$('#news_mtk').html(html_mtk);
				
				}
				$.each(output.mtl,function (indx,val){
					

					html_mtl += "<option value='"+ val +"'";
					if(data_mtl == val) html_mtl+= "selected";
					html_mtl += ">"+val +"</option>";
					});
					$('#news_mtl').html(html_mtl);
				

			
									}	
		
		});
        //$('#form_company #password').val('');
        //$('#form_company #fiscal_year').val(output.data[0].fiscal_year);
        //$('#form_company #employees').val(output.data[0].employees);
       //$('#form_company #market_cap').val(output.data[0].market_cap);
        //$('#form_company #headquarters').val(output.data[0].headquarters);
        hide_loading_message();
		$('#side-menu').hide();
        show_lightbox();
      } else {
        hide_loading_message();
        show_message('Information request failed', 'error');
      }
    });
    request.fail(function(jqXHR, textStatus){
      hide_loading_message();
      show_message('Information request failed: ' + textStatus, 'error');
    });
  });
  
  // Edit company submit form
  $(document).on('submit', '#form_company.edit', function(e){
    e.preventDefault();
    // Validate form
    if (form_company.valid() == true){
      // Send company information to database
      hide_ipad_keyboard();
      hide_lightbox();
      show_loading_message();
      var id        = $('#form_company').attr('data-id');
      var form_data = $('#form_company').serialize();
	  //console.log(form_data);
      var request   = $.ajax({
        url:          'ajax_2.php?type=edit_news&id=' + id,
        cache:        false,
        data:         form_data,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get'
      });
      request.done(function(output){
        if (output.result == 'success'){
          // Reload datable
          table_companies.api().ajax.reload(function(){
            hide_loading_message();
			$('#side-menu').show();
            var company_name = $('#news_name').val();
            show_message("Bảng tin '" + company_name + "' chỉnh sửa thành công.", 'success');
          }, true);
        } else {
          hide_loading_message();
		  $('#side-menu').show();
          show_message('Edit request failed', 'error');
        }
      });
      request.fail(function(jqXHR, textStatus){
        hide_loading_message();
		$('#side-menu').show();
        show_message('Edit request failed: ' + textStatus, 'error');
      });
    }
  });
  
  // Delete company
  $(document).on('click', '.function_delete a', function(e){
    e.preventDefault();
    var company_name = $(this).data('name');
    if (confirm("Bạn có chắc là muốn xóa '" + company_name + "' ?")){
      show_loading_message();
      var id      = $(this).data('id');
	  //console.log('ajax_2.php?type=delete_news&id=' + id);
      var request = $.ajax({
        url:          'ajax_2.php?type=delete_news&id=' + id,
        cache:        false,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get'
      });
      request.done(function(output){
        if (output.result == 'success'){
			$('#side-menu').show();
          // Reload datable
          table_companies.api().ajax.reload(function(){
            hide_loading_message();
            show_message("Bảng tin '" + company_name + "' đã xóa thành công.", 'success');
          }, true);
        } else {
			$('#side-menu').show();
          hide_loading_message();
          show_message('Delete request failed', 'error');
        }
      });
      request.fail(function(jqXHR, textStatus){
		  $('#side-menu').show();
        hide_loading_message();
        show_message('Delete request failed: ' + textStatus, 'error');
      });
    }
  });

});