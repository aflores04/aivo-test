<?php


namespace TwitterApp\Adapter;

class TwitterResponseAdapter implements ArrayAdapter
{
    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function toArray($data)
    {
        try {
            $map = array_map(function ($value) {
                return [
                    'created_at' => $value->created_at,
                    'text' => $value->text,
                    'in_reply' => [
                        'id' => $value->in_reply_to_user_id,
                        'name' => $value->in_reply_to_screen_name
                    ]
                ];
            }, $data);

            return $map;
        } catch (\Exception $e) {
            throw new \Exception('tweets most be an array');
        }
    }

}