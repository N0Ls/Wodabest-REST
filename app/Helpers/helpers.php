<?php

/**
 * 
 * Count the number of projects of a specific category.
 * @return number
 */
if (! function_exists('countProjectsByCategory')) {
    function countProjectsByCategory($category_id, $projects) {
      $count = 0;
      foreach($projects as $project)
      {
        if($project->category_id == (int)$category_id) $count += 1;
      }
      return $count;
    }
}