<?php 
include "./query/singlepost.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostHir</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #45474B;">
    <div class="min-h-[100vh] w-full">
        <?php include './layouts/navbar.php' ; ?>
        <div class="px-3 text-white mx-3 my-3 max-w-sm sm:max-w-xl lg:max-w-2xl mx-auto py-10">
            <h1 class="text-xl font-bold uppercase"><?php echo $post["title"] ; ?></h1>
            <div class="flex flex-col sm:flex-row gap-3 pb-3">
                <h1 class="font-semibold">Writer: <span class="text-slate-300"><?php echo $post["name"] ; ?></span></h1>
                <h1 class="font-semibold">Categories: <span class="text-slate-300"><?php echo $post["category"] ; ?></span></h1>
                <h1 class="font-semibold">Date: <span class="text-slate-300"><?php echo $post["created_at"] ; ?></span></h1>
            </div>

            <div class="flex flex-wrap gap-3 pb-3">
                <?php foreach($tags as $tag) {; ?>
                    <div class="px-3 py-1 bg-[rgba(255,255,255,0.3)]">
                        <?php echo $tag["tags"] ?>
                    </div>
                <?php }; ?>
            </div>

            <h1 class="font-semibold">Description: </h1>
            <p class="pb-3"><?php echo $post["description"] ; ?></p>

            <h1 class="font-semibold">Content: </h1>
            <p><?php echo $post["content"] ; ?></p>

            <form method="post" class="py-3">
                <button name="addToFavoritesBtn" type="submit" class="bg-yellow-500 px-3 py-2 hover:bg-yellow-600 rounded-lg">Add to Favorites</button>
            </form>

            <h1 class="font-semibold">Comments: </h1>
            <form class="flex pb-3 gap-3" method="post">
                <input type="text" id="comment" name="comment" class="py-1 px-2 w-full outline-none bg-transparent border-2 border-white" placeholder="comment here...">
                <button class="bg-blue-500 hover:bg-blue-600 px-5" name="sendBtn">Send</button>
            </form>
            <div class="py-3">
                <?php foreach($comments as $comment ) { ; ?>
                    <div class="w-full py-3 px-3 bg-[rgba(255,255,255,0.2)] mb-3">
                        <div class="flex justify-between pb-2">
                            <h1><?php echo $comment["username"]; ?></h1>
                            <h1><?php echo $comment["created_at"]; ?></h1>
                        </div>
                        <p><?php echo $comment["comment"]; ?></p>
                    </div>
                <?php } ; ?>
            </div>
        </div>
    </div>
</body>
</html>