<?php
include "./query/profile.php"
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
      <div class="mx-3 my-10 max-w-sm md:max-w-lg lg:max-w-2xl mx-auto">
        <div class="text-white text-sm md:text-lg font-semibold flex flex-col sm:flex-row sm:justify-between pb-3">
          <h1>Name: <span class="text-slate-300"><?php echo $user["name"]; ?></span></h1>
          <h1>Username: <span class="text-slate-300"><?php echo $user["username"]; ?></span></h1>
        </div>
        <div class="border-2 border-slate-300 text-white">
          <form class="flex flex-col px-3 py-3" method="post">
            <h1 class="font-bold pb-3">CREATE YOUR BLOG</h1>
            <label for="title">Title: </label>
            <input
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none"
              placeholder="title"
              type="text"
              name="title"
              id="title"
              required
            />
            <label for="description" class="pt-3">Description: </label>
            <input
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none"
              placeholder="description"
              type="text"
              name="description"
              id="description"
              required
            />
            <label for="content" class="pt-3">Main Content: </label>
            <textarea
              placeholder="write here..."
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none min-h-32"
              name="content"
              id="content"
              required
            ></textarea>
            <label for="category" class="pt-3">Category: </label>
            <select
              name="category"
              id="category"
              required
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none"
            >
              <option value="Technology" class="text-black">Technology</option>
              <option value="Travel" class="text-black">Travel</option>
              <option value="Food" class="text-black">Food</option>
              <option value="Sports" class="text-black">Sports</option>
              <option value="Fashion" class="text-black">Fashion</option>
              <option value="News" class="text-black">News</option>
              <option value="Other" class="text-black">Other</option>
            </select>
            <label for="tags" class="pt-3">Tags: (example: #trend, #mustread)... Can't edit tags.</label>
            <input
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none"
              placeholder="tags"
              type="text"
              name="tags"
              id="tags"
            />
            <div class="flex sm:justify-end">
              <button
                class="bg-white text-black py-2 mt-3 w-full sm:w-32 hover:bg-slate-200"
                name="submit"
                type="submit"
              >
                Add Blog..
              </button>
            </div>
          </form>
        </div>
      </div>
      <?php if(!empty($posts)): ?>
      <h1 class="text-center pb-3 text-white text-2xl font-bold">Your Posts: </h1>
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
          <div class="flex justify-between ">
            <a href=<?php echo "./singlepost.php?id=" . urlencode($post["id"]) . "&title=" . urlencode($post["title"]) ; ?>>
                <button class="bg-blue-600 hover:bg-blue-700 px-2 py-1">Look now..</button>
            </>
            <div class="flex gap-2">
              <a href=<?php echo "./updatepost.php?id=" . urlencode($post["id"]) . "&title=" . urlencode($post["title"]) ; ?>>
              <button class="bg-yellow-600 hover:bg-yellow-700 px-2 py-1">Edit</button>
              </a>
              <form method="post">
                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                <button type="submit" name="deleteBtn" class="bg-red-600 hover:bg-red-700 px-2 py-1">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <?php else: ?>
        <h1 class="text-center pb-3 text-white text-2xl font-bold">You haven't created a post yet</h1>
        <?php endif; ?> 
      </div>
      
    </div>
</body>
</html>