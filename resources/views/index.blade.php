<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Data Wilayah</title>    

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Ajax JS -->
        <script src="/assets/js/drop-ajax.js"></script>
    </head>
    <body>

        <div class="container col-md-6" style="padding-top: 50px;">
            <div class="card">
                <div class="card-header bg-primary text-white"><strong>Data Wilayah</strong></div>
                <div class="card-body">
                    <form method="POST" action="/submit">
                        @csrf

                        <div class="form-group">
                            <label for="title">Province:</label>
                            <select name="province" class="form-control">
                                <option value="">--- Choose Provinsi ---</option>
                                @foreach ($province as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <option value="">Regency:</option>
                            <select name="regency" class="form-control">
                            </select>
                        </div>

                        <div class="form-group">
                            <option value="">District:</option>
                            <select name="district" class="form-control">
                            </select>
                        </div>

                        <div class="form-group">
                            <option value="">Village:</option>
                            <select name="village" class="form-control">
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="province"]').on('change', function() {
                    var Reg_ID = $(this).val();
                    if(Reg_ID) {
                        $.ajax({
                            url: '/index/regency/'+Reg_ID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('select[name="regency"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="regency"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="regency"]').empty();
                    }
                });

                $('select[name="regency"]').on('change', function() {
                    var Dis_ID = $(this).val();
                    if(Dis_ID) {
                        $.ajax({
                            url: '/index/district/'+Dis_ID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('select[name="district"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="district"]').empty();
                    }
                });

                $('select[name="district"]').on('change', function() {
                    var Vil_ID = $(this).val();                 
                    if(Vil_ID) {
                        $.ajax({
                            url: '/index/village/'+ Vil_ID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('select[name="village"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="village"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="village"]').empty();
                    }
                });
            });
        </script>

    </body>
</html>
