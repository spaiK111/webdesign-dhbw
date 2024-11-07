
export class CarsBuilder {

    async fetchBlogPosts(pagination, make, model, ps1, ps2, category, fueltype) {
        try {
            const makeVal = make ? make : '';
            const modelVal = model ? model : '';
            const ps1Val = ps1 ? ps1 : 0;
            const ps2Val = ps2 ? ps2 : '';
            const categoryVal = category ? category : '';
            const fueltypeVal = fueltype ? fueltype : '';
            const blogPostsContainer = document.getElementById('item-list');
            const response = await fetch(`http://localhost:5000/api/posts/gPPP?pagination=${pagination}&make=${makeVal}&model=${modelVal}&ps1=${ps1Val}&ps2=${ps2Val}&category=${categoryVal}&fueltype=${fueltypeVal}`); // URL der API
            const posts = await response.json();
            console.log(posts)
            // Blogposts in das HTML einfügen
            posts.forEach(async post => {
                const image_1 = post.image_1 ? post.image_1 : "../../images/car-not-found.jpg"; // Fallback-Bild verwenden
                const image_2 = post.image_2 ? post.image_2 : "../../images/car-not-found.jpg";
                const image_3 = post.image_3 ? post.image_3 : "../../images/car-not-found.jpg";
                const image_4 = post.image_4 ? post.image_4 : "../../images/car-not-found.jpg";

                const postElement = document.createElement('div');
                postElement.classList.add('parent');
                postElement.innerHTML = `
                
                    <div class="div1 ">
                        <div class="all_images">
                            <div class="big_image">
                                <img src="${image_1} ">
                                
                            </div>
                            <div class="small_images">
                                <img src="${image_2}">
                                <img src="${image_3}">
                                <img src="${image_4}">
                            </div>
                        </div>
                    </div>
                    <div class="div2">
                        <div class="div2-body">
                            <div class="content">
                                <h2 class="car-name">
                                    <a href="./preset.php?uid=${post._id}">${post.make}</a>
                                </h2>
                            </div>
                            <section>
                                <div class="beschreibung">
                                    <div class="beschreibung-content">${post.model} • ${post.year} - ${post.engine}</div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="div3">
                        <div class="price-box">
                            <div class="price-content">
                                <span class="price-info">${post.fuelType} • ${post.kw} KW • ${post.category} • ${post.hubraum}  </span>
                            </div>
                            <span class="beschreibung"> publiziert vom ${post.author}</span>
                            
                        </div>
                    </div>
                    <div class="div4">
                    </div>
                `;
                console.log("here1")
                blogPostsContainer.appendChild(postElement);
                console.log("here2")
            });
        } catch (error) {
            console.error('Error fetching blog posts:', error);
        }


    }

    async deleteOldPosts(){
        const blogPostsContainer = document.getElementById('item-list');
        blogPostsContainer.innerHTML = '';
    }
}
