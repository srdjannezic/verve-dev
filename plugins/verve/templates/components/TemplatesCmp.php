<?php namespace Verve\Templates\Components;



use Event;

use BackendAuth;

use Cms\Classes\Page;

use Cms\Classes\ComponentBase;

use Verve\Templates\Models\TemplatesModel as Template;

use Illuminate\Database\Eloquent\ModelNotFoundException;



class TemplatesCmp extends ComponentBase

{

    /**

     * @var BlogPost The post model used for display.

     */

    public $template;



    public function componentDetails()

    {

        return [

            'name'        => 'Templates',

        ];

    }



    public function defineProperties()

    {

        return [

            'name' => [

                'title'       => 'slug',

                'default'     => '{{ :name }}',

                'type'        => 'string',

            ],

        ];

    }





    public function onRun()

    {

        $template = Template::where('slug',$this->property('name'))->first();

        $how = json_decode($template->attributes['how_it_works']);

        foreach ($how as $h) {

            $is_video = $this->filterIsVideo($h->media);



            if($is_video){

                $h->video = $h->media;

            }

            else{

                $h->image = $h->media;

            }

        }



        $testimonails = json_decode($template->attributes['about']);

        foreach ($testimonails as $t) {

            $is_video = $this->filterIsVideo($t->media);

            if($is_video){  

                $t->video = $t->media;

            }

            else{

                $t->image = $t->media;

            }

        }

        $template->attributes['how_it_works'] = json_encode($how);

        $template->attributes['about'] = json_encode($testimonails);

        //var_dump($testimonails);

        //$is_video = $this->filterIsVideo($template->attributesimages);

        $this->page['template'] = $this->template = $template;

    }







    private function filterIsVideo($file){

        $video = false;

        $exploded = explode(".",$file);

        $ext = end($exploded);



        if(strtolower($ext) =="mp4")

        {

            $video = true;

        }

        elseif(strtolower($ext) =="avi"){

            $video = true;

        }  

        elseif(strtolower($ext) =="wmv"){

            $video = true;

        }   

        elseif(strtolower($ext) =="webm"){

            $video = true;

        }       

        elseif(strtolower($ext) =="3gp"){

            $video = true;

        }   

        elseif(strtolower($ext) =="ogg"){

            $video = true;

        }



        return $video;         

    }

 

}

