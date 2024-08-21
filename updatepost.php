<?php 
include "./query/updatepost.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostHir</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #45474B ;">
    <div class="min-h-screen bg-[#45474B]">
        <?php include "./layouts/navbar.php"; ?>
        <div class="mx-3 my-3 max-w-sm md:max-w-lg lg:max-w-2xl mx-auto">
        <div class="border-2 border-slate-300 text-white">
          <form class="flex flex-col px-3 py-3" method="post">
            <h1 class="font-bold pb-3">EDIT BLOG</h1>
            <label for="title">Title: </label>
            <input
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none"
              placeholder="title"
              type="text"
              name="title"
              id="title"
              value="<?php echo htmlspecialchars($data["title"]); ?>"
              required
            />
            <label for="description" class="pt-3">Description: </label>
            <input
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none"
              placeholder="description"
              type="text"
              name="description"
              id="description"
              value="<?php echo htmlspecialchars($data["description"]); ?>"
              required
            />
            <label for="content" class="pt-3">Main Content: </label>
            <textarea
              placeholder="write here..."
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none min-h-32"
              name="content"
              id="content"
              required
            ><?php echo htmlspecialchars($data["content"]); ?></textarea>
            <label for="category" class="pt-3">Category: </label>
            <select
              name="category"
              id="category"
              value="<?php echo htmlspecialchars($data["category"]); ?>"
              required
              class="py-1 px-3 bg-[rgba(255,255,255,0.2)] outline-none"
            >
            <option value="Technology" class="text-black" <?php if($data['category'] == "Technology") echo 'selected'; ?>>Technology</option>
              <option value="Travel" class="text-black" <?php if($data['category'] == "Travel") echo 'selected'; ?>>Travel</option>
              <option value="Food" class="text-black" <?php if($data['category'] == "Food") echo 'selected'; ?>>Food</option>
              <option value="Sports" class="text-black" <?php if($data['category'] == "Sports") echo 'selected'; ?>>Sports</option>
              <option value="Fashion" class="text-black" <?php if($data['category'] == "Fashion") echo 'selected'; ?>>Fashion</option>
              <option value="News" class="text-black" <?php if($data['category'] == "News") echo 'selected'; ?>>News</option>
              <option value="Other" class="text-black" <?php if($data['category'] == "Other") echo 'selected'; ?>>Other</option>
            </select>
            <div class="flex sm:justify-end">
              <button
                class="bg-white text-black py-2 mt-3 w-full sm:w-32 hover:bg-slate-200"
                name="submit"
                type="submit"
              >
                Save Edit..
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>