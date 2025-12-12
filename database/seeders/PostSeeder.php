<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Get first admin user and first few categories
        $admin = User::where('is_admin', true)->first();
        $categories = Category::all();

        if (!$admin || $categories->isEmpty()) {
            $this->command->warn('Please ensure users and categories are seeded first.');
            return;
        }

        $posts = [
            [
                'title' => 'The Future of CSS Grid',
                'description' => 'How modern layout techniques are changing the way we build the web...',
                'content' => '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>

<p>Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

<h2>Why Layouts Matter</h2>
<p>Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.</p>

<blockquote>"Design is not just what it looks like and feels like. Design is how it works."</blockquote>

<p>Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh.</p>',
                'image_url' => 'https://placehold.co/800x450/e2e8f0/64748b?text=CSS+Grid',
                'status' => 'published',
                'category_id' => $categories->where('name', 'Technology')->first()?->id ?? $categories->first()->id,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Minimalism in 2024',
                'description' => 'Why whitespace is your best friend when designing complex interfaces.',
                'content' => '<p class="lead">In the world of modern design, less is often more. Minimalism continues to dominate the design landscape in 2024.</p>

<p>Whitespace, also known as negative space, is the empty space between and around elements in a design. It\'s not just "blank" space—it\'s a powerful design element that helps create balance, hierarchy, and focus.</p>

<h2>The Power of Whitespace</h2>
<p>When used effectively, whitespace can improve readability, draw attention to important elements, and create a sense of sophistication and elegance.</p>',
                'image_url' => 'https://placehold.co/800x450/cbd5e1/64748b?text=Minimalism',
                'status' => 'published',
                'category_id' => $categories->where('name', 'Design')->first()?->id ?? $categories->first()->id,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Mastering Laravel Blade',
                'description' => 'Tips and tricks to keep your templates clean and maintainable.',
                'content' => '<p class="lead">Laravel Blade is a powerful templating engine that makes it easy to create dynamic, reusable views.</p>

<p>In this article, we\'ll explore some advanced Blade techniques that will help you write cleaner, more maintainable code.</p>

<h2>Component-Based Architecture</h2>
<p>Blade components allow you to create reusable UI elements that can be used throughout your application. They\'re perfect for things like buttons, cards, and form inputs.</p>',
                'image_url' => 'https://placehold.co/800x450/94a3b8/ffffff?text=Laravel',
                'status' => 'published',
                'category_id' => $categories->where('name', 'Coding')->first()?->id ?? $categories->first()->id,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Remote Work Balance',
                'description' => 'Finding the sweet spot between productivity and mental health.',
                'content' => '<p class="lead">Remote work has become the new normal for many professionals, but finding the right balance can be challenging.</p>

<p>In this guide, we\'ll explore strategies for maintaining productivity while also taking care of your mental and physical health.</p>

<h2>Setting Boundaries</h2>
<p>One of the biggest challenges of remote work is separating work life from personal life. Setting clear boundaries is essential.</p>',
                'image_url' => 'https://placehold.co/800x450/475569/ffffff?text=Remote+Work',
                'status' => 'published',
                'category_id' => $categories->where('name', 'Lifestyle')->first()?->id ?? $categories->first()->id,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Draft: Laravel 11 Features',
                'description' => 'Exploring the exciting new features coming in Laravel 11.',
                'content' => '<p class="lead">Laravel 11 is bringing some exciting new features and improvements to the framework.</p>

<p>This is a draft article that will be updated as more information becomes available.</p>',
                'image_url' => 'https://placehold.co/800x450/f1f5f9/64748b?text=Laravel+11',
                'status' => 'draft',
                'category_id' => $categories->where('name', 'Coding')->first()?->id ?? $categories->first()->id,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Understanding TypeScript Generics',
                'description' => 'A deep dive into one of TypeScript\'s most powerful features.',
                'content' => '<p class="lead">Generics are one of TypeScript\'s most powerful features, allowing you to write flexible, reusable code.</p>

<p>In this comprehensive guide, we\'ll explore how to use generics effectively in your TypeScript projects.</p>',
                'image_url' => 'https://placehold.co/800x450/dbeafe/3b82f6?text=TypeScript',
                'status' => 'draft',
                'category_id' => $categories->where('name', 'Technology')->first()?->id ?? $categories->first()->id,
                'user_id' => $admin->id,
            ],
        ];

        foreach ($posts as $postData) {
            Post::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($postData['title'])],
                $postData
            );
        }

        $this->command->info('Posts seeded successfully!');
    }
}
