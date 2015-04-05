<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Topic extends Model
{
    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'topics';

    /**
     * @var array
     */
    protected $fillable = ['title', 'summary', 'commentary', 'grade_id', 'subject_id','labs','partners','subcategories'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function standards(){
        $question_ids = Question::where('topic_id','=',$this->id)->lists('id');

        $standard_ids = DB::table('question_standard')->whereIn('question_id',$question_ids)->lists('standard_id');

        $standards = Standard::whereIn('id',$standard_ids)->get();

        return $standards;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function delete()
    {
        parent::delete();
        foreach (Question::where('topic_id','=',$this->id)->get() as $question) {
            $question->delete();
        }
    }

    public function restore()
    {
        parent::restore();
        foreach(Question::onlyTrashed()->where("topic_id",'=',$this->id)->get() as $question){
            $question->restore();
        }
    }
}
