<!DOCTYPE html>
<html>
<head>
    <title>Laravel Dynamic Dependent Dropdown Using Ajax-বাংলায়</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Laravel Dynamic Dependent Dropdown Using Ajax-বাংলায়</div>
      <div class="panel-body">
            <div class="form-group">
                <select id="country" name="category_id" class="form-control" style="width:350px" >
                <option value="" selected disabled>Select</option>
                  @foreach($countries as $item)
                  	<option value="{{$item->id}}"> {{$item->title}}</option>
                  @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" id="state" class="form-control" style="width:350px">
                </select>
            </div>
         
            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" id="city" class="form-control" style="width:350px">
                </select>
            </div>
      </div>
    </div>
</div>
<script src="{{ asset('design/jquery.js') }}"></script>
<script type="text/javascript">
    $('#country').change(function(){
    var country_id = $(this).val(); 
    //alert(country_id);   
    if(country_id){
        $.ajax({
           type:"GET",
           url:"{{url('get-state-list')}}?country_id="+country_id,
           success:function(res){ 
           console.log(res);              
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key){
                    $("#state").append('<option value="'+res[key].id+'">'+res[key].title+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $("#city").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+res[key].id+'">'+res[key].title+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>
</body>
</html>