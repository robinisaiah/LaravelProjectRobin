<?php

use App\Student;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
class CreateStudentMutation extends Mutation
{
protected $attributes = [
'name' => 'createStudent'
];

public function type(): Type
{
    return GraphQL::type('student');
}

public function args(): array
{
    return [
        "id" => [
            'name' => 'id',
            'type' => Type::nonNull(Type::int()),
        ],
        'name' => [
            'name' => 'name',
            'type' => Type::nonNull(Type::string())
        ],
        'email' => [
            'name' => 'email',
            'type' => Type::nonNull(Type::string())
        ],
        'age' => [
            'name' => 'age',
            'type' => Type::nonNull(Type::int())
        ],
        'country' => [
            'name' => 'country',
            'type' => Type::nonNull(Type::string())
        ]
    ];
}

public function resolve($root, $args)
{
    $student = new Student();
    $student->name = $args['name'];
    $student->email = $args['email'];
    $student->age = $args['age'];
    $student->country = $args['country'];
    $student->save();

    return $student;
}
}
