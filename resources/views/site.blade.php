<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Geo API</title>
</head>
<body class="antialiased">
<label for="address">Address</label><input id="address" type="text" placeholder="Enter address"/>
<button id="sendAddress">Отправить</button>
</body>
<script src="{{ asset('/vendor/jquery/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#sendAddress').click(function () {
            $.ajax({
                url: 'saveAddress',
                data: {
                    address: $('#address').val()
                },
                type: 'POST',
                success: function (data) {
                    alert(data);
                    clearInput()
                },
                error: function (data) {
                    if (data.status === 422) {
                        alert(data?.responseJSON?.message)
                        clearInput()
                    }
                }
            });
        })
    })

    function clearInput() {
        $('#address').val('')
    }
</script>
</html>
