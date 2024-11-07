<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LikeButton</title>
    <link rel="stylesheet" href="assets/like-button/like-button.css">

</head>
<body>

    <div class="like-button">
        <input class="on" id="heart" type="checkbox" />
         <label class="like" for="heart">
        <svg
        class="like-icon"
        fill-rule="nonzero"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
        >
        <path
            d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"
        ></path>
        </svg>
        <span class="like-text">Likes</span>
        </label>
        <span class="like-count "><?php echo htmlspecialchars($data['long_dsc']); ?></span>
        
    </div>

    
    
</body>
</html>