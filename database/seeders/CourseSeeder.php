<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Course::create([
        //     'title' => 'HTML',
        //     'description' => 'Good watch',
        //     'video' => 200,
        //     'course_price' => 5000,
        //     'duration' => '90min',
        //     'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=989&q=80'
        // ]);
        // Course::create([
        //     'title' => 'JavaScript',
        //     'description' => 'Good Bag',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1491637639811-60e2756cc1c7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=669&q=80'
        // ]);
        // Course::create([
        //     'title' => 'TypeScript',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'NodeJS',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'Python',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'Django',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'Machine Learning',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'Data Analysis',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'R ( Programming Language )',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'HTML 5',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'Deep Learning',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
        // Course::create([
        //     'title' => 'Natural Language Processing',
        //     'description' => 'Good perfume',
        //     'video' => 200,
        //     'course_price' => 200,
        //     'duration' => 200,
        //     'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        // ]);
    }
}