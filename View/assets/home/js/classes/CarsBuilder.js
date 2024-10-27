
export class CarsBuilder {

    async fetchBlogPosts(pagination) {
        try {
            const blogPostsContainer = document.getElementById('item-list');
            const response = await fetch(`http://localhost:5000/api/posts/gPPP?pagination=${pagination}`); // URL der API
            const posts = await response.json();
            
            // Blogposts in das HTML einfügen
            posts.forEach(async post => {
                const imageFront = post.image_front ? post.image_front : "/assets/home/images/car-not-found.jpg"; // Fallback-Bild verwenden
                const imageBack = post.image_back ? post.image_back : "/assets/home/images/car-not-found.jpg";
                const imageSide = post.image_side ? post.image_side : "/assets/home/images/car-not-found.jpg";
                const imageInterior = post.image_interior ? post.image_interior : "/assets/home/images/car-not-found.jpg";



                const postElement = document.createElement('div');
                postElement.classList.add('parent');
                postElement.innerHTML = `
                
                    <div class="div1 ">
                        <div class="all_images">
                            <div class="big_image">
                                <img src="${imageFront} ">
                                <span><i class="far fa-heart"></i> 22</span>
                            </div>
                            <div class="small_images">
                                <img src="${imageBack}">
                                <img src="${imageSide}">
                                <img src="${imageInterior}">
                            </div>
                        </div>
                    </div>
                    <div class="div2">
                        <div class="div2-body">
                            <div class="content">
                                <span class="badge-font bagde-margin badge-style">Gesponsert</span>
                                <h2 class="car-name">
                                    <a href="http://localhost:3000/preset.php?id=${post._id}">${post.make}</a>
                                </h2>
                            </div>
                            <section>
                                <div class="beschreibung">
                                    <div class="beschreibung-content">${post.model} • ${post.color} • ${post.engine}</div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="div3">
                        <div class="price-box">
                            <div class="price-content">
                                <span class="price-info">${post.mileage}</span>
                            </div>
                            <span class="beschreibung">21% MwSt.</span>
                            <div class=""><span class="price-txt hover-color">Finanzierung berechnen</span></div>
                        </div>
                    </div>
                    <div class="div4">
                        <div class="div4-content">
                            <div class="">
                                <span class="price-txt hover-txt-vers">Versicherung vergleichen</span>
                            </div>
                            <div class="button-box button-box-hover-vers">
                                <button class="contact-btn">Kontakt</button>
                                <button class="call-btn">Anrufen</button>
                            </div>
                        </div>
                    </div>
                `;
    
                blogPostsContainer.appendChild(postElement);
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
