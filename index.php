<!DOCTYPE html>
<html>
<head>
    <title>Analyze Sample</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


    <div class="container justify-content-center">

        <h1 class="m-3">Image Analyzer</h1>
        <p class="m-3">made by prad</p>


        <p>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-primary mt-3 ml-3" type="button" data-toggle="collapse" data-target="#collapseImages" aria-expanded="false" aria-controls="collapseImages">
                    Show Image
                </button>

                <button class="btn btn-secondary mt-3" type="button" data-toggle="collapse" data-target="#collapseInput" aria-expanded="false" aria-controls="collapseInput">
                    Upload Image
                </button>
            </div>
            
        </p>

        <div class="collapse" id="collapseInput">
            <div class="card card-body mb-3">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Link Images</label>
                        <input val="hoho" type="text" class="form-control" id="inputLinkImage" aria-describedby="emailHelp" placeholder="example : https://subm2.blob.core.windows.net/images/test3.jpg">
                    </div>
                </form>
                
                <button class="btn btn-secondary" onclick="uploadImage($('#inputLinkImage').val())">Upload</button>
                <br><br>
                <h1 id="uploadStatus"></h1>
            </div>
        </div>

        <div class="collapse" id="collapseImages">
            <div class="card card-body mb-3">
                <div class="container m-3">
                    <button type="button" onclick="getLink()" class="btn btn-primary btn-lg m-3">Get Images from server</button>
                </div>
                <div id="images-place" class="row justify-content-center">
                    <!-- gambar gambar akan berada disini -->
                </div>
            </div>
        </div>

        

        

    </div>
    
  

    <script src="vision.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>