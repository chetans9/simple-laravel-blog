@extends('layouts.template')

@section('content')
    <div class="contact">
        <div class="container">

            <div class="contact-text">
                <div class="col-md-4 contact-left">
                    <h4>Sed dapibus nunc eu metus commodo, et dictum justo fermentum.</h4>
                    <p>Aliquam quis lacus at sapien tempor semper. Sed ultrices et metus et elementum. Nunc sed justo at
                        erat
                        consequat mollis et eu lectus.</p>
                    <div class="address">
                        <h4>Address</h4>
                        <p>The company name,
                            <span>Lorem ipsum dolor,</span>
                            Glasglow Dr 40 Fe 72.</p>
                    </div>
                </div>
                <div class="col-md-8 contact-right">
                    <div class="alert alert-success alert-dismissable form-success" style="display: none;">

                    </div>
                    <div class="alert alert-danger validation-errors" style="display: none;">
                        Oops! Something went wrong.
                        <ul>

                        </ul>
                    </div>
                    {{Form::open(["url"=>url('contact'),'method'=>'POST','id'=>'contact_form'])}}
                    {{Form::text('name',null,["required"=>"required","placeholder"=>"Name"])}}
                    {{Form::email('email',null,["required"=>"required","placeholder"=>"Email"])}}
                    {{Form::textarea('message',null,["required"=>"required","placeholder"=>"Message"])}}
                    <div class="submit-btn">
                            <input type="submit" value="SUBMIT">
                    </div>
                    {{Form::close()}}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#contact_form').submit(function(e){
                e.preventDefault();
                //var data = $(this).serialize();
                var data = $(this).serialize();
                var $validationErrors = $('.validation-errors');

                $.ajax({
                    data : data,
                    url : window.location.href,
                    type : 'post',
                    dataType : 'json',
                    success : function (response) {
                        if(response.status == 1)
                        {
                            $(".form-success").show();
                            $(".form-success").html(response.message);
                            $('#contact_form').trigger("reset");
                            $validationErrors.hide();
                        }
                    },
                    error: function(data) {

                        $validationErrors.show();
                        var errorsHtml;
                        var errors = data.responseJSON;
                        //var $ul = $('.validation-errors').find('ul').html();
                        $.each( errors , function( key, value ) {
                            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                        });
                        $validationErrors.find('ul').html(errorsHtml);
                    },
                    processData : false,

                });


            });
        });
    </script>
@endsection