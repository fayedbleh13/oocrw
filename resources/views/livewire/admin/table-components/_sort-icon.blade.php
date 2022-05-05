@if ($sortField !== $field)
    <i class="text-muted fas fa-sort"></i>
@elseif ($sortDirection === 'asc')
    <i class="fas fa-sort-up"></i>
@elseif ($sortDirection === 'desc')
    <i class="fas fa-sort-down"></i>
@endif