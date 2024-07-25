
function confirmation(event)
{
    event.preventDefault();

    var urlToRedirect = event.currentTarget.getAttribute('href');

    console.log(urlToRedirect);

    swal({

        title: "Are you sure want to delete?",
        text: "You will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

    .then((willCancel)=>{
        if(willCancel)
        {
            window.location.href = urlToRedirect;
        }
    })
}
