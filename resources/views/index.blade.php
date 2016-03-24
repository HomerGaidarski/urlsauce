@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Create new short url</h2>

                <div class="input-group">
                    <input type="url" class="form-control" id="long_url" name="long_url" placeholder="paste a url here" required/>
                    <span class="input-group-btn">
                        <button id="create" type="submit" class="btn btn-primary" type="button">=></button>
                    </span>
                    <input class="form-control" type="url" id = "short_url" placeholder="short link will appear here" readonly/>
                    <span class="input-group-btn">
                        <button id="test" class="btn btn-default">Test</button>
                    </span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
        </div>
    </div>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#create').click(function () {
                var long_url = $('#long_url').val();

                // prevent users from entering blank urls
                if (!long_url) {
                } else {
                    $.ajax({
                        type: "POST",
                        url: 'store',
                        data: {'long_url' : long_url},
                        success: function (data) {
                            console.log(data);
                            var shortUrl;
                            if (data === "NOT VALID URL!")
                            {
                                shortUrl = data;
                            }
                            else
                            {
                                // get website page name (so it doesn't matter if i'm testing in a local environment or different domain name, etc.)
                                shortUrl = window.location.href + data;
                                console.log(shortUrl);
                            }
                            $('#short_url').val(shortUrl);
                            $('#long_url').val(""); // clear long_url so if users accidentally double click, they won't generate 2 urls instead of 1
                        }
                    });
                }
            });

            $('#test').click(function(){
                var short_url = $('#short_url').val();
                if (!short_url);
                else
                {
                    window.open(short_url);
                }
            });
        });
    </script>
@stop