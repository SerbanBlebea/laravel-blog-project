<template>
    <div>
        <div v-if="selectedImage !== null" class="row">
            <div v-for="(image, index) in chosenImage" class="col-md-4 mb-2">
                <img class="img-thumbnail"
                     v-if="image !== null"
                     :src="path(image)"
                     v-on:click="removeImage(index)">

                <input type="hidden" :name="name + ((multiple == true) ? '[]' : '')" v-model="image.id">
            </div>
        </div>

        <button type="button"
                class="btn btn-outline-secondary mt-3"
                data-toggle="modal"
                data-target="#img-modal">
            Select image
        </button>


        <div class="modal" tabindex="-1" role="dialog" id="img-modal">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div v-if="imageList.length > 0"
                                 v-for="(image, index) in imageList"
                                 :key="index"
                                 class="col-md-4 col-12">

                                <image-card v-on:delete="onImageDelete(image.id)"
                                            :image="image">
                                    <div v-bind:style="{ 'background-image': 'url(' + path(image) + ')' }"
                                         class="image--bg image--bg__medium w-100 pointer"
                                         v-on:click="selectImage(index)"
                                         v-bind:class="{ 'selected-img': isSelected(image) }"></div>
                                </image-card>

                            </div>

                            <div v-if="imageList.length == 0"
                                 style="min-height: 30vh;"
                                 class="col-12 d-flex align-items-center justify-content-center">
                                <h4 class="text-muted">Please upload an image</h4>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">

                        <image-upload :user="user"
                                      v-on:image-uploaded="onUploadImage()"></image-upload>
                        <div class="col-md-6 p-0">
                        <button type="button"
                                v-on:click="removeImage()"
                                class="btn btn-secondary float-right"
                                data-dismiss="modal">Close</button>
                        <button type="button"
                                v-on:click="chooseImage()"
                                class="btn btn-primary float-right mr-2"
                                data-dismiss="modal">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: ['user', 'name', 'default-image', 'multiple-img'],
    data: function()
    {
        return {
            multiple: (this.multipleImg == 'true') ? true : false,
            image: (this.defaultImage !== '') ? JSON.parse(this.defaultImage) : null,
            imageList: [],
            selectedImage: [],
            chosenImage: [],
        }
    },
    methods:
    {
        getImages: function()
        {
            axios.get(this.api + 'images/' + this.user).then((result)=> {
                this.imageList = result.data;
            }).catch((err)=> {
                console.log(err)
            })
        },
        path: function(image)
        {
            return '/' + image.path;
        },
        selectImage: function(index)
        {
            if(this.isSelected(this.imageList[index]) == false)
            {
                if(!this.multiple && this.selectedImage.length == 1)
                {
                    this.selectedImage = [];
                }
                this.selectedImage.push(this.imageList[index]);

            } else {
                var position = this.selectedImage.indexOf(this.imageList[index])
                this.selectedImage.splice(position, 1);
            }
        },
        removeImage: function(index)
        {
            this.selectedImage.splice(index, 1)
        },
        chooseImage: function()
        {
            this.chosenImage = this.selectedImage
        },
        onImageDelete: function(id)
        {
            axios.get(this.api + 'image/delete/' + id).then((result)=> {
                if(result.data == 200)
                {
                    this.getImages();
                }
            }).catch((err)=> {
                console.log(err)
            })
        },
        onUploadImage: function()
        {
            this.getImages();
        },
        isSelected: function(image)
        {
            var names = this.selectedImage.map((item)=> {
               return item.name;
            });
            return (names.includes(image.name)) ? true : false
        }
    },
    mounted()
    {
        this.getImages();

        if(this.image !== null)
        {
            if(this.multiple)
            {
                this.chosenImage = this.image
                this.selectedImage = this.image
            } else {
                this.chosenImage.push(this.image)
                this.selectedImage.push(this.image)
            }
        }
    }
}
</script>
