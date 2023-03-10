<script>

    $(document).ready(function () {
        var formId = '{{ $formId }}'
        var Form = $('#' + formId);

        var className = '{{ $className }}'
        var element = $('.' + className);

        element.on('click', function(e){

            e.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass:{
                    confirmButton : 'btn btn-success mx-2',
                    cancelButton : 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                     title: 'آیا از ویرایش داده مطمن هستید؟',
                        text: "شما میتوانید درخواست خود را لغو نمایید",
                         icon: 'question',
                         showCancelButton: true,
                        confirmButtonText: 'بله داده ویرایش شود.',
                        cancelButtonText: 'خیر درخواست لغو شود.',
                        reverseButtons: true
                        }).then((result) => {

                            if(result.value == true){
                                console.log($(this),$(this).parent());
                                Form.submit();
                            }
                            else if(result.dismiss === Swal.DismissReason.cancel){
                            }

                        })

        })

    })


</script>
