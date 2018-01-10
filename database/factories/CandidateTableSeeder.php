<?php

use Illuminate\Database\Seeder;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Candidate::create([
            'user_id' => '1',
            'position_id' => '1',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'I want to lead and make this year as good as possible for our class.  I hope to ease some of the pressure of being a freshman by having events that our whole class will enjoy -- and that doesn’t just mean dances, other fun things will be planned, too. I will also do whatever I can to get our class’s voice heard on student council. All in all, I want to make this year fun',
            'party'=>'1',
        ]));

        factory(App\Candidate::create([
            'user_id' => '2',
            'position_id' => '2',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => ' I will bring my ideas along with your ideas to each Student Council Meeting in order to make the best Freshman year ever! I am an organized, responsible leader ready to serve our class. I plan on working with the other class officers and representatives to ensure that everybody’s suggestions will be heard. I hope all of you voice your opinion by voting and continue to speak up throughout the school year!',
            'party'=>'1',
        ]));

        factory(App\Candidate::create([
            'user_id' => '3',
            'position_id' => '3',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'I am an organized, responsible leader ready to serve our class. I plan on working with the other class officers and representatives to ensure that everybody’s suggestions will be heard. I hope all of you voice your opinion by voting and continue to speak up throughout the school year!',
            'party'=>'1',
        ]));

        factory(App\Candidate::create([
            'user_id' => '4',
            'position_id' => '4',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'We have so many talented students, artists, athletes, musicians, you name it! If elected, I will help make sure your voices and interests are heard so we can have the best year ever. I am enthusiastic, energetic, and dedicated. With these qualities I will work hard to be a strong member of Student Council. Thank you for your support.',
            'party'=>'1',
        ]));

        factory(App\Candidate::create([
            'user_id' => '5',
            'position_id' => '5',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'My job will be to listen and to be your advocate. I am a leader who is determined, strong and willing to do what it takes to make our freshman year great. I know what every one of you is going through. I understand how busy schedules can be and how challenging classes can get. I will bring all our ideas to student council meetings with that in mind. I will make a difference by listening to you. I can’t wait to hear your voice when I represent you.',
            'party'=>'1',
        ]));

        factory(App\Candidate::create([
            'user_id' => '6',
            'position_id' => '6',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'To become a legendary class, we need ideas, energy, strength and confidence.  If elected, I will work with you and for you to build a class that works for all of us.  I am determined that YOUR concerns be heard and answered.  I believe that we should have FUN as a Class and be a MAJOR part of the school. ',
            'party'=>'1',
        ]));

        factory(App\Candidate::create([
            'user_id' => '7',
            'position_id' => '1',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'I want to lead and make this year as good as possible for our class.  I hope to ease some of the pressure of being a freshman by having events that our whole class will enjoy -- and that doesn’t just mean dances, other fun things will be planned, too. I will also do whatever I can to get our class’s voice heard on student council. All in all, I want to make this year fun',
            'party'=>'2',
        ]));

        factory(App\Candidate::create([
            'user_id' => '8',
            'position_id' => '2',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => ' I will bring my ideas along with your ideas to each Student Council Meeting in order to make the best Freshman year ever! I am an organized, responsible leader ready to serve our class. I plan on working with the other class officers and representatives to ensure that everybody’s suggestions will be heard. I hope all of you voice your opinion by voting and continue to speak up throughout the school year!',
            'party'=>'2',
        ]));

        factory(App\Candidate::create([
            'user_id' => '9',
            'position_id' => '3',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'I am an organized, responsible leader ready to serve our class. I plan on working with the other class officers and representatives to ensure that everybody’s suggestions will be heard. I hope all of you voice your opinion by voting and continue to speak up throughout the school year!',
            'party'=>'2',
        ]));

        factory(App\Candidate::create([
            'user_id' => '10',
            'position_id' => '4',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'We have so many talented students, artists, athletes, musicians, you name it! If elected, I will help make sure your voices and interests are heard so we can have the best year ever. I am enthusiastic, energetic, and dedicated. With these qualities I will work hard to be a strong member of Student Council. Thank you for your support.',
            'party'=>'2',
        ]));

        factory(App\Candidate::create([
            'user_id' => '11',
            'position_id' => '5',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'My job will be to listen and to be your advocate. I am a leader who is determined, strong and willing to do what it takes to make our freshman year great. I know what every one of you is going through. I understand how busy schedules can be and how challenging classes can get. I will bring all our ideas to student council meetings with that in mind. I will make a difference by listening to you. I can’t wait to hear your voice when I represent you.',
            'party'=>'2',
        ]));

        factory(App\Candidate::create([
            'user_id' => '12',
            'position_id' => '6',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'To become a legendary class, we need ideas, energy, strength and confidence.  If elected, I will work with you and for you to build a class that works for all of us.  I am determined that YOUR concerns be heard and answered.  I believe that we should have FUN as a Class and be a MAJOR part of the school. ',
            'party'=>'2',
        ]));

        factory(App\Candidate::create([
            'user_id' => '13',
            'position_id' => '1',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'I want to lead and make this year as good as possible for our class.  I hope to ease some of the pressure of being a freshman by having events that our whole class will enjoy -- and that doesn’t just mean dances, other fun things will be planned, too. I will also do whatever I can to get our class’s voice heard on student council. All in all, I want to make this year fun',
            'party'=>'3',
        ]));

        factory(App\Candidate::create([
            'user_id' => '14',
            'position_id' => '2',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => ' I will bring my ideas along with your ideas to each Student Council Meeting in order to make the best Freshman year ever! I am an organized, responsible leader ready to serve our class. I plan on working with the other class officers and representatives to ensure that everybody’s suggestions will be heard. I hope all of you voice your opinion by voting and continue to speak up throughout the school year!',
            'party'=>'3',
        ]));

        factory(App\Candidate::create([
            'user_id' => '15',
            'position_id' => '3',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'I am an organized, responsible leader ready to serve our class. I plan on working with the other class officers and representatives to ensure that everybody’s suggestions will be heard. I hope all of you voice your opinion by voting and continue to speak up throughout the school year!',
            'party'=>'3',
        ]));

        factory(App\Candidate::create([
            'user_id' => '16',
            'position_id' => '4',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'We have so many talented students, artists, athletes, musicians, you name it! If elected, I will help make sure your voices and interests are heard so we can have the best year ever. I am enthusiastic, energetic, and dedicated. With these qualities I will work hard to be a strong member of Student Council. Thank you for your support.',
            'party'=>'3',
        ]));

        factory(App\Candidate::create([
            'user_id' => '17',
            'position_id' => '5',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'My job will be to listen and to be your advocate. I am a leader who is determined, strong and willing to do what it takes to make our freshman year great. I know what every one of you is going through. I understand how busy schedules can be and how challenging classes can get. I will bring all our ideas to student council meetings with that in mind. I will make a difference by listening to you. I can’t wait to hear your voice when I represent you.',
            'party'=>'3',
        ]));

        factory(App\Candidate::create([
            'user_id' => '18',
            'position_id' => '6',
            'slogan' => "Vote for me I'm the right choice, vote for me I'll be your voice.",
            'statement' => 'To become a legendary class, we need ideas, energy, strength and confidence.  If elected, I will work with you and for you to build a class that works for all of us.  I am determined that YOUR concerns be heard and answered.  I believe that we should have FUN as a Class and be a MAJOR part of the school. ',
            'party'=>'3',
        ]));

    }
}
