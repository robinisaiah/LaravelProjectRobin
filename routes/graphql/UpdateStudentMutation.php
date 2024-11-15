<?php
namespace App\graphql\Mutations;
use App\Student;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
class UpdateStudentMutation extends Mutation
{
    protected $attributes = [
        "name" => "updateStudent",
    ];
    public function type(): Type
    {
        return GraphQL::type("Student");
    }
    public function args(): array
    {
        return [
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
        $student = Student::findOrFail($args["id"]);
        $student->fill($args);
        $student->save();
        return $student;
    }
}
