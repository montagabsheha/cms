class SimpleImage {
    static get toolbox() {
        return {
          title: 'GIF',
          icon: '<svg width="17" height="15" viewBox="0 0 336 276" xmlns="http://www.w3.org/2000/svg"><path d="M291 150V79c0-19-15-34-34-34H79c-19 0-34 15-34 34v42l67-44 81 72 56-29 42 30zm0 52l-43-30-56 30-81-67-66 39v23c0 19 15 34 34 34h178c17 0 31-13 34-29zM79 0h178c44 0 79 35 79 79v118c0 44-35 79-79 79H79c-44 0-79-35-79-79V79C0 35 35 0 79 0z"/></svg>'
        };
      }
    
      constructor({data}){
        this.data = data;
        this.wrapper = undefined;
      }
    
      render(){
        this.wrapper = document.createElement('div');
        this.wrapper.classList.add('simple-image');
        // console.log('wrapper');
        // console.log(this.wrapper);
        if (this.data && this.data.url){
           //this._createImage(this.data.url, this.data.caption);
            return this.wrapper;
        }
    



        this.modal = document.createElement('div');   
        this.modal.classList.add('modal');
        this.modalcontent = document.createElement('div');
        this.modalcontent.classList.add('modal-content');
          this.modalcontent.style.display="block";
        this.modalspan = document.createElement('sapn');
        // this.modalspan.innerHTML = "<p>Some text in the Modal..</p>";
        this.modalspan.classList.add('close');

        this.searchTeaxtarea = document.createElement("input");
        this.searchTeaxtarea.placeholder="search term";
        this.searchTeaxtarea.style.marginRightn="5px;";
        this.searchButton = document.createElement("Button");
        this.searchButton.innerHTML="Search";


        this.imageDiv = document.createElement('Div');
        this.imageDiv.setAttribute("style","overflow:auto;height:500px;width:1200px");
        this.insertButton = document.createElement("Button");
        this.insertButton.innerHTML="Insert";
        this.cancelButton = document.createElement("Button");
        this.cancelButton.innerHTML="Cancel";



        this.modal.style.display = "block";
        this.modal.appendChild(this.modalcontent);
        this.modalcontent.appendChild(this.modalspan); 
        this.modalcontent.appendChild(this.searchTeaxtarea); 
        this.modalcontent.appendChild(this.searchButton); 
        this.modalcontent.appendChild(this.imageDiv);
        // this.modalcontent.appendChild(this.insertButton); 
        this.modalcontent.appendChild(this.cancelButton); 
        
        this.cancelButton.addEventListener('click', (event) => {
                this.modal.style.display = "none";
            });

        this.searchButton.addEventListener('click', (event) => {
              this.searchclicked(this.searchTeaxtarea.value);
          });
        
          this.insertButton.addEventListener('click', (event) => {
            this.insertclicked(event.clipboardData.getData('text'));
        });
    


        this.father = document.createElement('div');   
        this.father.appendChild(this.wrapper);
        this.father.appendChild(this.modal);
        
        return this.father;
      }

      searchclicked(data){
        let request = new XMLHttpRequest();
      // alert(data);
        request.open("GET", "http://localhost:3000/search?term2="+data);
        request.send();
        request.onload=()=>{
                // console.log(request);
                if (request.status === 200){
                  const images = JSON.parse(request.response);
                  // console.log(JSON.parse(request.response));
                  const imagesarray = images.parsed.data;
                  // console.log(imagesarray);
                  // console.log(imagesarray[0].url);
                  var i=0;
                  for ( i in imagesarray) {
                    var img = document.createElement("img");
                    img.src =imagesarray[i].images.fixed_height.url;
                    var t = imagesarray[i].images.fixed_height.url;
                    self = this;
                    img.addEventListener('click', (event) => {
                     this.imgcliked(self,event.currentTarget.src);
                  });
                    // this.imageDiv.appendChild("<img src="+imagesarray[i].images.fixed_height.url+"></img>");
                    this.imageDiv.appendChild(img);
                    i++;
                   }
                }else{
                  console.log('error ${request.status} ${request.statustext}');
                }	
        }
      
      }

      imgcliked(self,data){
        // alert(data);
        // console.log("self");
        // console.log(self);
        
        var tempimage = document.createElement('img');

        tempimage.src = data;
       
        // console.log(self.wrapper);
        // console.log("image");
        // console.log(tempimage);
        this.modal.style.display = "none";
        var newrapper = document.getElementsByClassName("simple-image");
        newrapper[0].appendChild( tempimage);
        // self.wrapper.appendChild(self.tempimage);
        // return self.wrapper;
      }

      insertclicked(data){
        // alert(data);
      }
    
     _createImage(url, captionText){
        const image = document.createElement('img');
        const caption = document.createElement('div');

        image.src = url;
        caption.contentEditable = true;
        caption.innerHTML = captionText || '';

        this.wrapper.innerHTML = '';
        this.wrapper.appendChild(image);
        this.wrapper.appendChild(caption);
      }
    
    
      

      save(blockContent){
        // alert("save");
        // debugger;
        const image = blockContent.querySelector('img');
        // debugger;
        return {
          url: image? image.src:""
          // url: images[0].src,
        }
        
      }
    
      // validate(savedData){
      //   if (!savedData.url.trim()){
      //     return false;
      //   }
    
      //   return true;
      // }
}