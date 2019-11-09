function addpost(username, postid, avatar){
    var div = document.createElement('div');
        div.setAttribute('class', 'post');
        var idname1 = "post-" + postid + "-" + username;
        div.setAttribute('id', idname1);
        document.getElementById("posts").appendChild(div);
    var div = document.createElement('div');
        var idname = "post-" + postid + "-" + username + "-avatar";
        div.setAttribute('id', idname);
        div.setAttribute('class', 'avdiv');
        document.getElementById(idname1).appendChild(div);
    var img = document.createElement('img');
        var avatar = "database/avatars/"+username+".jpg";
        img.src = avatar;
        img.setAttribute('class', 'avatar');
        document.getElementById(idname).appendChild(img);
    var h2 = document.createElement('h2');
        h2.setAttribute('class', 'username');
        h2.innerHTML = username;
        document.getElementById(idname).appendChild(h2);
    var img = document.createElement('img');
        var post = "database/posts/post-"+postid+"-"+username+".jpg";
        img.src = post;
        img.setAttribute('class', 'postimage');
        document.getElementById(idname1).appendChild(img);
    var div = document.createElement('div');
        div.setAttribute('class', 'imgic');
        var idname2 = "post-" + postid + "-" + username + "-imgic";
        div.setAttribute('id', idname2);
        document.getElementById(idname1).appendChild(div);
    var button = document.createElement('button');
        var idname3 = "post-" + postid + "-" + username + "-imgic-like";
        button.setAttribute('id', idname3);
        button.setAttribute('class', 'likeicon');
        document.getElementById(idname2).appendChild(button);
        checklikes(idname3, postid, username);
    var p = document.createElement('p');
        p.setAttribute('class', 'likes');
    var postlikes = "post-" + postid + "-" + username + "-likes";
        p.setAttribute('id', postlikes);
        var url = "backend/likes.php?postname=post-"+postid+"-"+username+"&username="+username;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url);
        xhr.send();
        xhr.onload = function() {
          let responseObj = xhr.response;
          p.innerHTML = responseObj;
        };
        document.getElementById(idname2).appendChild(p);
    var button = document.createElement('button');
        var idname4 = "post-" + postid + "-" + username + "-imgic-comment";
        button.setAttribute('id', idname4);
        button.setAttribute('class', 'commenticon');
        var funct = "comment(\"" + idname4 + "\")";
        //button.setAttribute('onclick', funct);
        document.getElementById(idname2).appendChild(button);
    var i = document.createElement('i');
        i.setAttribute('class', 'large fa fa-commenting-o');
        document.getElementById(idname4).appendChild(i);
    var br = document.createElement('br');
        document.getElementById("posts").appendChild(br);
    var br = document.createElement('br');
        document.getElementById("posts").appendChild(br);
        return;
}
function checklikes(idname3,postid,username) {
    var url1 = "backend/checklike.php?postname=post-" + postid + "-" + username;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url1);
    xhr.responseType = 'text';
    xhr.send();
    xhr.idname3 = idname3;
    xhr.onload = function () {
        var response = xhr.response;
        var id = xhr.idname3;
        var i = document.createElement('i');
        i.setAttribute('class', 'large fa fa-heart');
        if (response === "notliked") {
            i.setAttribute('id', 'like');
        }
        if (response === "isliked") {
            i.setAttribute('id', 'liked');
            i.style.color = "rgb(243,187,83)";
        }
        document.getElementById(idname3).appendChild(i);
    };
}
function updatelikes(opt, post) {
    var url = "backend/updatelikes.php?postname="+post+"&opt="+opt;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send();
    xhr.onload = function () {
        let responseObj = xhr.response;
        var p = document.getElementById(post+"-likes");
        p.innerHTML = responseObj;
    };
}
function uploading(){
    window.location.href = "uploading.php";
}
function camera(){
    window.location.href = "camera.php";
}
function notlogged(){
    alert("Please Login To Continue");
    window.location.href = "login.php";
}
function addpreviewpost(postid){
    var username = postid.slice(7);
    var div = document.createElement('div');
        div.setAttribute('id', 'previewpost');
        div.setAttribute('class', 'postpreview');
        document.body.appendChild(div);
    var br = document.createElement('br');
        document.getElementById("previewpost").appendChild(br);
    var div = document.createElement('div');
        var idname = "prev" + postid + "-avatar";
        div.setAttribute('id', idname);
        div.setAttribute('class', 'prevavdiv');
        document.getElementById("previewpost").appendChild(div);
    var img = document.createElement('img');
        img.src = "database/avatars/" + username + ".jpg";
        img.setAttribute('class', 'prevavatar');
        document.getElementById(idname).appendChild(img);
    var h2 = document.createElement('h2');
        h2.setAttribute('class', 'prevusername');
        h2.innerHTML = postid.slice(7);
        document.getElementById(idname).appendChild(h2);
    var br = document.createElement('br');
        document.getElementById("previewpost").appendChild(br);
    var img = document.createElement('img');
        var post = "database/posts/"+postid+".jpg";
        img.src = post;
        img.setAttribute('class', 'prevpostimage');
        document.getElementById("previewpost").appendChild(img);
}
function fillcommentsection(username, comment) {
    var commentsection = document.getElementsByClassName('commentsection');
    var h3 = document.createElement('h3');
        var text = username+":  "+comment;
        h3.innerHTML = text;
        document.getElementsByClassName('commentsection')[0].appendChild(h3);
    var br = document.createElement('br');
        document.getElementsByClassName('commentsection')[0].appendChild(br);
}
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}
function comment(comname) {
    var div = document.createElement('div');
        div.setAttribute('class', 'comformdiv');
        div.setAttribute('id', 'comformdiv');
        document.getElementById("previewpost").appendChild(div);
    var form = document.createElement('form');
        form.setAttribute('id', 'comform');
        form.setAttribute('class', 'comform');
        var act = "addcomment(\""+comname+"\")";
        form.setAttribute('action', 'backend/addcomment.php');
        document.getElementById("comformdiv").appendChild(form);
    var inpt = document.createElement('input');
        inpt.setAttribute('type', 'text');
        inpt.setAttribute('id', 'comment');
        inpt.setAttribute('class', 'comment');
        inpt.setAttribute('name', 'comment');
        inpt.setAttribute('placeholder', 'Comment...');
        document.getElementById("comform").appendChild(inpt);
        return;
}
function commentsectionjs(comname) {
    document.cookie = "postname="+comname;
    setTimeout(function(){
    var div = document.createElement('div');
        div.setAttribute('class', 'comments');
        div.setAttribute('id', 'comments');
        document.getElementById("previewpost").appendChild(div);
    var div = document.createElement('div');
        div.setAttribute('id', comname);
        div.setAttribute('class', 'commentsection');
        document.getElementById("comments").appendChild(div);
        var jscode = document.createElement('script');
        var url = "backend/commentings.php?postname="+comname;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url);
        xhr.send();
        xhr.onload = function() {
          let responseObj = xhr.response;
          jscode.innerHTML = responseObj;//""<//?//php $post = $_COOKIE['postname']; commentings($post);?>;
        };
        div.appendChild(jscode);}, 700);
}
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    document.getElementById("sidebar").style.height = "155px";
    return;
}
function nodeslist() {
    var c = document.getElementById("previewpost").childNodes;
    var txt = "";
    var i;
    for (i = 0; i < c.length; i++) {
      txt = txt + c[i].nodeName + "<br>";
    }
    document.getElementById("demo").innerHTML = txt;
    document.getElementById("previewpost").childNodes[0].classlist.remove("avdiv");
    document.getElementById("previewpost").childNodes[0].setAttribute('class', 'prevavdiv');
  }
window.onclick = function(event) {
    elem = document.getElementById("previewpost");
    commentinput = document.getElementById("comformdiv");
    comments = document.getElementById("comments");
    if (commentinput && !event.target.matches('.commments') && !event.target.matches('.commmentsection') && !event.target.matches('.comment'))
        commentinput.parentNode.removeChild(commentinput);
    if (comments && !event.target.matches('.commments') && !event.target.matches('.commmentsection') && !event.target.matches('.comment'))
        comments.parentNode.removeChild(comments);
    if ((elem) && !event.target.matches('.postpreview') && !event.target.matches('.prevusername') && !event.target.matches('.commments') && !event.target.matches('.commmentsection') && !event.target.matches('.comment') && !event.target.matches('.prevlikeicon') && !event.target.matches('.previmgic') && !event.target.matches('.prevthumbsup') && !event.target.matches('.prevavdiv') && !event.target.matches('.prevavatar') && !event.target.matches('.prevpostimage') && !event.target.matches('.prevcommenticon') && !event.target.matches('.prevcommenting')){
        elem.parentNode.removeChild(elem);
    }
    var upload = document.getElementById("uploadbutton");
    var camera = document.getElementById("camerabutton");
    if (upload && camera && !event.target.matches('.uploadbutton') && !event.target.matches('.camerabutton'))
    {
        upload.parentNode.removeChild(upload);
        camera.parentNode.removeChild(camera);
        document.getElementById("divposticon").style.height = "0px";
    }
    if (event.target.matches('.fa-plus-circle'))
    {
            event.target.parentNode.style.height = "50px";
            event.target.parentNode.style.width = "150px";
            var button = document.createElement('button');
            button.setAttribute('class', 'uploadbutton');
            button.setAttribute('id', 'uploadbutton');
            button.innerHTML = "Upload";
            button.setAttribute('onclick', "uploading();")
            document.getElementById("addposticon").appendChild(button);
            var button = document.createElement('button');
            button.setAttribute('class', 'camerabutton');
            button.setAttribute('id', 'camerabutton');
            button.innerHTML = "Camera";
            var url = "./backend/uploadbutton.php?button=camera";
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url);
            xhr.send();
            xhr.onload = function() {
                var responseObj = xhr.response;
                var funct = responseObj;
                button.setAttribute('onclick', funct);
            };
            document.getElementById("addposticon").appendChild(button);

    }
    if (event.target.matches('.fa-heart'))
    {
        if (event.target.id == "like")
        {
            event.target.style.color = "rgba(243,187,83)";
            event.target.id = "liked";
            updatelikes("add", event.target.parentNode.parentNode.parentNode.id);
        }
        else if (event.target.id == "liked")
        {
            event.target.style.color = "black";
            event.target.id = "like";
            updatelikes("less", event.target.parentNode.parentNode.parentNode.id);
        }
    }
    if (event.target.matches('.post') || event.target.matches('.avdiv') || event.target.matches('.avatar') || event.target.matches('.postimage') || event.target.matches('.commenticon') || event.target.matches('.fa-commenting-o')){
        if (event.target.matches('.post')){
            addpreviewpost(event.target.id);
        }
        else if (event.target.matches('.postimage') || event.target.matches('.avdiv')){
            if (event.target.parentNode.id != "previewpost")
                addpreviewpost(event.target.parentNode.id);
        }
        else if (event.target.matches('.commenticon') || event.target.matches('.avatar')){
            if (event.target.parentNode.parentNode.id != "previewpost")
                addpreviewpost(event.target.parentNode.parentNode.id);
        }
        else if (event.target.matches('.fa-commenting-o')){
            if (event.target.parentNode.parentNode.parentNode.id != "previewpost")
                addpreviewpost(event.target.parentNode.parentNode.parentNode.id);
        }
    }
    if (event.target.matches('.prevcommenting'))
    {
        var comname = event.target.parentNode.id.replace('-imgic-comment', '').slice(4);
        commentsectionjs(comname);
        comment(comname);
    }
    /*var commenticons = document.getElementsByClassName("fa-commenting-o");
    var i;
    for (i = 0; i < commenticons.length; i++) {
        var opencomment = commenticons[i];
        opencomment.style.color = "#424242";
    }
    elem = document.getElementById("comments");
    if (elem && !event.target.matches('.comform') && !event.target.innerHTML('Select File') && !event.target.matches('.comment')){
        elem.parentNode.removeChild(elem);
        document.getElementById("sidebar").style.height = "700px";
        }
    if (!event.target.matches('.camagrulogo') && !event.target.matches('.commenticon') && !event.target.matches('.comform') && !event.target.matches('.comments') && !event.target.matches('.comment') && !event.target.matches('.fa-commenting-o')) {
        var commenticons = document.getElementsByClassName("fa-commenting-o");
        var i;
        for (i = 0; i < commenticons.length; i++) {
            var opencomment = commenticons[i];
            document.getElementById("sidebar").style.height = "70px";
            opencomment.style.color = "#424242";
        }
        elem = document.getElementById("comments");
        if (elem){
            elem.parentNode.removeChild(elem);}
        elem = document.getElementById("comment");
        if (elem){
            elem.parentNode.removeChild(elem);}
        elem = document.getElementById("comform");
        if (elem){
            elem.parentNode.removeChild(elem);}
    }*/
    /*else if (event.target.matches('.fa-commenting-o')) {
        var divid = event.target.parentNode.parentNode.parentNode.id;
        document.cookie = "postname="+divid;
        //document.getElementsByClassName("commentsection")[0].style.display = "block";
        document.getElementById("sidebar").style.height = "500px";
        event.target.style.color = "#c2c2c2";
        elem = document.getElementById("comment");
        if (elem){
            elem.parentNode.removeChild(elem);}
        elem = document.getElementById("comments");
        if (elem){
            elem.parentNode.removeChild(elem);}
        elem = document.getElementById("comform");
        if (elem){
            elem.parentNode.removeChild(elem);}
        elem = document.getElementById("comformdiv");
        if (elem){
            elem.parentNode.removeChild(elem);}
        comment(event.target.parentNode.parentNode.parentNode.id);
        commentsectionjs(event.target.parentNode.parentNode.parentNode.id);
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length + 1; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
    else if (event.target.matches('.comform') || event.target.matches('.comments') || event.target.matches('.comment')){
        var posttag = event.target.parentNode.parentNode.querySelector("div").id;
        event.target.setAttribute('placeholder', 'Comment...'+posttag);
    }*/
    else if (event.target.matches('.camagrulogo')){
        window.location.href = "index.php";
    }
    return;
}