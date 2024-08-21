<?php 
include "./query/favorites.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostHir</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-[#45474B]">
        <?php include "./layouts/navbar.php" ?>
        <?php if(!empty($favorites)): ?>
        <h1 class="text-white text-2xl font-bold text-center py-10">Your Favorites: </h1>
        <div class="flex flex-wrap justify-center gap-3">
            <?php foreach( $favorites as $favorite ) { ; ?>
                <div class="w-[300px] bg-[rgba(255,255,255,0.2)] text-white ">
                    <div class="p-2 flex flex-col gap-1">
                        <div>
                            <h1 class="font-bold text-xl"><?php echo $favorite["title"] ; ?></h1>
                            <h1 class="font-semibold text-xs text-slate-300">Writer: <?php echo $favorite["name"] ; ?></h1>
          </div>
          <div class="h-[10rem] overflow-auto">
              <p class="text-sm">
              <?php echo $favorite["description"]; ?>
            </p>
        </div>
        <div class="flex justify-between">
        <a href="<?php echo "./singlepost.php?id=" . urlencode($favorite["post_id"]) . "&title=" .  urlencode($favorite["title"]); ?>">
        <button class="bg-blue-600 px-2 py-1 hover:bg-blue-700">Read now..</button>
        </a>
                <form method="post">
                  <input type="hidden" name="favorite_id" value="<?php echo $favorite['id']; ?>">
                  <button type="submit" name="deleteBtn" class="bg-red-600 px-2 py-1 hover:bg-red-700">Delete</button>
                </form>
            </div>
        </div>
    </div>
            <?php } ; ?>
            <?php else : ?>
                <h1 class="text-white text-2xl font-bold text-center py-10">You haven't added the post to favorites.</h1>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>