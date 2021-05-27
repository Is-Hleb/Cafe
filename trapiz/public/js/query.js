function post_request(button_id, form, url){
    let button = document.getElementById(button_id);
    button.addEventListener("click", function(){
        let data = new FormData(form);
        function post() {
            return new Promise(function(succeed, fail){
                let request = new XMLHttpRequest();
                request.open('post', url, true);
                request.addEventListener("load", function(){
                    if(request.status < 400)
                        succeed(request.response);
                    else
                        fail(request.statusText);
                });
                request.send(data);
            });
        }
        post().then(function(text){
            console.log(text);
            document.getElementsByName("add_review")[0].reset();
        }, function(error){
            console.log(error);
        });
    });
}
