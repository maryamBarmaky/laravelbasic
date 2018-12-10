@if(session()->has('flash_message'))
    <script>

        swal("{{session('flash_message.title')}}",
                "{{session('flash_message.message')}}",
                "{{session('flash_message.level')}}")

    </script>
@endif



@if(session()->has('flash_message_overlay'))
    <script>

        swal({
                    title: "{{session('flash_message_overlay.title')}}",
                    text: "{{session('flash_message_overlay.message')}}",
                    type: "{{session('flash_message_overlay.level')}}",
                    confirmButtonText: 'okay',
        )
        }
        ;

    </script>
@endif
