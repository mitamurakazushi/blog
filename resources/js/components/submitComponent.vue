<template>
    <div>
        <p>
            <input type="text" placeholder="タイトル" v-model="title">
        </p>
        <p>
            <input type="text" placeholder="本文" v-model="body">
        </p>
        <p>
            カテゴリー：
            <select v-model="category">
            <option value="text">メモ</option>
            <option value="music">音楽</option>
            <option value="photo">写真</option>
        </select>
        </p>
        <p>
            写真：
            <input @change="selectedFile" type="file" name="file">
        </p>
        <p>
            <button @click="getPosition(); timelate();">投稿</button>
        </p>
        <h1>{{ complete_script }}</h1>

    </div>
</template>

<script>
export default {
    data: () => {
        return {
            locations: {
                latitude: null,
                longitude: null
            },
            title: null,
            body: null,
            category: null,
            image: null,
            complete_script: null
        }
    },
    methods: {
        selectedFile: function(e) {
                // 選択された File の情報を保存しておく
                e.preventDefault();
                let files = e.target.files;
                this.image = files[0];
        },
        getPosition: function() {
            /*global navigator*/
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    this.locations.latitude = position.coords.latitude;
                    this.locations.longitude = position.coords.longitude;
                    console.log("get position");
                }.bind(this)
            );
        },
        timelate: function(){
            setTimeout(this.submitdata, 5000);
        },
        submitdata: function() {
            // 画像を送信する旨のheaders情報
            const config = {
                header: {
                    "Content-Type": "multipart/form-data"
                }
            };
            //画像を送信する時は、FormDataを使う。
            var formData = new FormData();
            //appendの第一引数がkey、第二引数がデータ
            formData.append("title", this.title);
            formData.append("body", this.body);
            formData.append("category", this.category);
            formData.append("latitude", this.locations.latitude);
            formData.append("longitude", this.locations.longitude);
            if(this.image){
                formData.append("image", this.image);
            }
            formData.append("iconurl", "https://photo2gmap.s3.ap-northeast-1.amazonaws.com/icon/"+this.category+".png");
            
            /*global axios*/
            axios.post("/posts", formData, config).then(
                  console.log("submit complete"),
                  this.complete_script = "投稿完了！");
        }
    }
}
</script>