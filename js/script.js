function validateTitle(articleTitle) {
    const TITLE_CHARACTER_LIMIT = 100;

    if (articleTitle.length > TITLE_CHARACTER_LIMIT) {
        alert("Title cannot be more than 100 letters long");
        return false;
    }
 
    return true;
}

function validateExtension(rawFile, allowedFiles) {
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    if (!regex.test(rawFile.value.toLowerCase())) {
        return false;
    }
    return true;
}

function validateImage(imageFile) {
    const FILE_SIZE_LIMIT = 3073;
    var allowedFiles = [".jpg", ".jpeg", ".png"];
    var imageFileSize = (imageFile.files[0].size / 1024).toFixed(2);

    if (imageFileSize > FILE_SIZE_LIMIT) {
        alert("Image should be less than 3 MB ");
        return false;
    }
    
    if (!validateExtension(imageFile, allowedFiles)) {
        alert("Invalid image type");
        return false;
    }

    return true;
}

function validateDocument(documentFile) {
    debugger
    const FILE_SIZE_LIMIT = 10240;
    var allowedFiles = [".doc", ".docx"];
    try{
        var documentFileSize = (documentFile.files[0].size / 1024).toFixed(2);    
    }
    catch(err){
        alert(err);
    }

    if (documentFileSize > FILE_SIZE_LIMIT) {
        alert("Document cannot be greater than 10 MB");
        return false;
    }

    if (!validateExtension(documentFile, allowedFiles)) {
        alert("Invalid document type");
        return false;
    }

    return true;
}

function validateFields() {
    var articleTitle = document.getElementById("articleTitle").value;
    var imageFile = document.getElementById("imageFile");
    var documentFile = document.getElementById("documentFile");

    if (!validateTitle(articleTitle)) {
        return false;
    }

    if (!validateImage(imageFile)) {
        return false;
    }

    if (!validateDocument(documentFile)) {
        alert("invalid");
        return false;
    }

    return true;
}
