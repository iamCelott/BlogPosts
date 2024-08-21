<?php  
include "./query/searchmenu.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostHir</title>
</head>
<body>
    <div class="min-h-screen bg-[#45474B]">
        <?php include './layouts/navbar.php' ?>
        <form method="post" action="searchmenu.php" class="flex pt-20 pb-10  justify-center gap-3">
            <input type="text" name="searchbar" placeholder="seacrh title or writer username..." class="px-3 py-2 w-1/2 outline-none">
            <button type="submit" name="searchBtn" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-1">Search</button>
        </form>
        <?php if (!empty($posts)): ?>
            <h1 class="text-white font-bold text-xl pb-3 text-center">Result search: <?php echo str_replace("%", "", $searchData); ?></h1>
            <div class="flex flex-wrap justify-center gap-3 pb-3">
        <?php foreach($posts as $post): ?>
        <div class="w-[300px] bg-[rgba(255,255,255,0.2)] text-white ">
        <div class="px-3 py-3 flex flex-col gap-1">
          <div>
            <h1 class="font-bold text-xl"><?php echo $post["title"] ; ?></h1>
            <h1 class="font-semibold text-xs text-slate-300">Writer: <?php echo $post["name"] ; ?></h1>
          </div>
          <div class="h-[10rem] overflow-auto">
            <p class="text-sm pt-2">
            <?php echo $post["description"] ; ?>
            </p>
          </div>
          <div class="flex justify-end ">
            <a href=<?php echo "./singlepost.php?id=" . urlencode($post["id"]) . "&title=" . urlencode($post["title"]) ; ?>>
                <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1">Read now..</button>
            </a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <?php else: ?>
            <h1 class="text-white font-bold text-xl text-center">No posts found based on search "<?php echo str_replace("%", "", $searchData); ?>"</h1>
        <?php endif; ?>
      </div>
    </div>
</body>
</html>