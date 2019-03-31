function processImage(sourceImageUrl) {
    var subscriptionKey = "6bc508b9ff3e46d7870aa7bc32b29130";
    var uriBase =
        "https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/analyze";

    // Request parameters.
    var params = {
        "visualFeatures": "Categories,Description,Color",
        "details": "",
        "language": "en",
    };


    // Make the REST API call.
    $.ajax({
        url: uriBase + "?" + $.param(params),

        // Request headers.
        beforeSend: function(xhrObj){
            xhrObj.setRequestHeader("Content-Type","application/json");
            xhrObj.setRequestHeader(
                "Ocp-Apim-Subscription-Key", subscriptionKey);
        },

        type: "POST",

        // Request body.
        data: '{"url": ' + '"' + sourceImageUrl + '"}',
    })

    .done(function(data) {
        // Show formatted JSON on webpage.
        $("h5[image='"+sourceImageUrl+"'").html(data.description.captions[0].text);
        var tags = data.description.tags;
        tags.forEach(function(tag){
            $("p[image='"+sourceImageUrl+"'").html($("p[image='"+sourceImageUrl+"'").text()+"#"+tag+" ");
            $("div[image='"+sourceImageUrl+"'").html("<p>"+JSON.stringify(data)+"</p>")
        });
        console.log(data);
        return data;
    })

    .fail(function(jqXHR, textStatus, errorThrown) {
        // Display error message.
        var errorString = (errorThrown === "") ? "Error. " :
            errorThrown + " (" + jqXHR.status + "): ";
        errorString += (jqXHR.responseText === "") ? "" :
            jQuery.parseJSON(jqXHR.responseText).message;
        alert(errorString);
    });
};

function getLink() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var str=this.responseText;
            str = str.substring(0, str.indexOf('\n'));

            var links = str.split("https://");
            links.shift();
            links.forEach(function(element) {
                if(element.includes(".jpg"))
                {
                    document.getElementById("images-place").innerHTML +=
                    "<div class='card m-3' style='width: 18rem;'>"+
                        "<img src='https://"+element+"' class='card-img-top'>"+
                        "<div class='card-body'>"+
                            "<h5 class='card-title' image='https://"+element+"'>Card title</h5>"+
                            "<p class='card-text' image='https://"+element+"'>"+processImage("https://"+element)+"</p>"+
                        "</div>"+
                        "<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#pic"+str.indexOf(element)+"' aria-expanded='false' aria-controls='pic"+str.indexOf(element)+"'>"+
                            "Show JSON"+
                        "</button>"+

                        "<div class='collapse' id='pic"+str.indexOf(element)+"'>"+
                            "<div image='https://"+element+"' class='card card-body'>"+
                                "<p></p>"+
                            "</div>"+
                        "</div>"+
                    "</div>";
                    }
                
            });
        }
    };

    xmlhttp.open("GET", "phpQS.php");
    xmlhttp.send();
}

function uploadImage(url) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var str=this.responseText;
            $("#uploadStatus").text(str);
            
        }
    };

    xmlhttp.open("GET", "upload_file.php?q=" + url);
    xmlhttp.send();
}

function displayExampleJSON(json){
    var strjson = JSON.stringify(json);

}