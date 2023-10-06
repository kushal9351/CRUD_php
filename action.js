// console.log("hello world");

    // var ele = document.getElementsByName('gender').value;
    // console.log(ele);

    // let gender;
    // let ele = document.getElementsByName('gender');

    // ele.forEach((ele)=>{
    //     if(ele.checked){
    //         gender = ele.value;
    //     }
    // })

    // console.log(gender);

    let rst = document.getElementById('rst');
    rst.addEventListener('click', ()=>{
        let inp = Array.from(document.getElementsByClassName("inpTxt"));
        inp.forEach((element) => {
            element.value = "";
        });
    })

    function clearErrors(){
        let errors = document.getElementsByClassName('formError');
        for(let item of errors){
            item.innerHTML = "";
        }
    }

    function setError(id, error){
        let element = document.getElementById(id);
        element.getElementsByClassName('formError')[0].innerHTML = error;
        // element.querySelector("input").style.border = "3px solid red";
        // console.log("hello", document.getElementsByClassName('formError'));
    }
    
    function validateForm(){
        clearErrors();
        let returnValue = true;
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        // let address = document.getElementById('address').value;
        // let gender = document.getElementById("");
        // console.log(name.length);
        // if(name.length == 0){
        //     setError("nameContainer", "* Length of name cannot be zero");
        //     returnValue = false;
        // 
        var letters = /^[A-Za-z]+$/;
        if(!name.match(letters)){
            // alert('Your name have accepted : you can try another');
            setError("nameContainer", "* Please input alphabet characters only");
            returnValue = false;
        }

        if(name.length < 4){
            setError("nameContainer", "* Length of name is too short");
            returnValue = false;
        }

        if(email.length > 25){
            setError("emailContainer", "* Length of email is too long");
            returnValue = false;
        }
        
        if(phone.length != 10){
            setError("phoneContainer", "* phone Number should be of 10 digits");
            returnValue = false;
        }

        var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        if((!phone.match(phoneno))){
            setError("phoneContainer", "* Not a valid Phone Number");

        }
        
        // if(!NaN(phone)){
        //     setError("phoneContainer", "* phone number should be integer")
        //     returnValue = false;
        // }
        return returnValue;
    }


    function getImagePreview(event){
        let image = URL.createObjectURL(event.target.files[0]);  
        console.log(event.target.files, "hello", image);
        let imgDiv = document.getElementById('preview');
        imgDiv.innerHTML = '';
        let newImg = document.createElement('img');
        newImg.src = image;
        newImg.width = 100;
        newImg.height = 100;
        imgDiv.appendChild(newImg);
    }


    