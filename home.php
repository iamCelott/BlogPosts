<?php 
include "./query/home.php"
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
        <?php include './layouts/navbar.php' ; ?>
        <form method="post" action="searchmenu.php" class="flex pt-20 pb-10  justify-center gap-3">
            <input type="text" name="searchbar" placeholder="seacrh title or writer username..." class="px-3 py-2 w-1/2 outline-none">
            <button type="submit" name="searchBtn" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-1">Search</button>
        </form>
        <?php if(!empty($posts)): ?>
        <h1 class="text-white text-2xl font-bold text-center">All Posts: </h1>
        <?php else : ?>
        <h1 class="text-white text-2xl font-bold text-center">No Post Found.</h1>
        <?php endif ; ?>
        <div class="flex flex-wrap justify-center gap-3 py-3 pb-10">
            <?php foreach($posts as $post) { ; ?>
                <div class="w-[300px] bg-[rgba(255,255,255,0.2)] text-white ">
                    <div class="p-2 flex flex-col gap-1">
                        <div>
                            <h1 class="font-bold text-xl"><?php echo $post["title"] ; ?></h1>
                            <h1 class="font-semibold text-xs text-slate-300">Writer: <?php echo $post["name"] ; ?></h1>
          </div>
          <div class="h-[10rem] overflow-auto">
              <p class="text-sm">
              <?php echo $post["description"]; ?>
            </p>
        </div>
        <div class="flex justify-end">
            <a href="<?php echo "./singlepost.php?id=" . urlencode($post["id"]) . "&title=" .  urlencode($post["title"]); ?>">
                <button class="bg-blue-600 px-2 py-1 hover:bg-blue-700">Read now..</button></a>
            </div>
        </div>
    </div>  
    <?php }; ?>
</div>
    </div>
                
</body>
</html>