<?php

namespace App\JsonApi\V1\Posts;

use App\Models\User;
use CloudCreativity\LaravelJsonApi\Eloquent\HasMany;
use CloudCreativity\LaravelJsonApi\Eloquent\HasOne;
use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *      the allowed paths, an empty array for none allowed, or null to allow all paths.
     */
    protected $allowedIncludePaths = [];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = [];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = [];
    /**
     * @param \App\Models\Post $record
     * @return iterable
     */
    protected function existingRelationships($record): iterable
    {
        return [
            'user' => $record->user,
        ];
    }
    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *      the record being updated, or null if creating a resource.
     * @param array $data
     *      the data being validated
     * @return array
     */
    protected function rules($record, array $data): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'user.id' => 'exists:users,id',
//            'user' => [
//                'required',
//                new HasOne('user_id'),
//            ],
//            'user.id' => ["required",'exists:users,id'],
//            'user' => [
//                'required',
//                new HasOne('user'),
//            ],
//            'comments' => new HasMany('comments'),
        ];
    }

    /**
     * Get query parameter validation rules.
     *
     * @return array
     */
    protected function queryRules(): array
    {
        return [
            //
        ];
    }

}
