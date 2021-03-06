<?php namespace Cribbb\Repositories\Invite;

use Cribbb\Repositories\Crudable;
use Illuminate\Support\MessageBag;
use Cribbb\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Cribbb\Repositories\AbstractRepository;

class EloquentInviteRepository extends AbstractRepository implements Repository, Crudable, InviteRepository {

  /**
   * @var Illuminate\Database\Eloquent\Model
   */
  protected $model;

  /**
   * Construct
   *
   * @param Illuminate\Database\Eloquent\Model $user
   */
  public function __construct(Model $model)
  {
    parent::__construct(new MessageBag);

    $this->model = $model;
  }

  /**
   * Find a valid invite by a code
   *
   * @param string $code
   * @return Illuminate\Database\Eloquent\Model
   */
  public function getValidInviteByCode($code)
  {
    return $this->model->where('invitation_code', '=', $code)
                       ->where('claimed_at', '=', null)
                       ->first();
  }

  /**
   * Create
   *
   * @param array $data
   * @return Illuminate\Database\Eloquent\Model
   */
  public function create(array $data)
  {
    return $this->model->create($data);
  }

  /**
   * Update
   *
   * @param array $data
   * @return Illuminate\Database\Eloquent\Model
   */
  public function update(array $data){}

  /**
   * Delete
   *
   * @param int $id
   * @return boolean
   */
  public function delete($id){}

}
