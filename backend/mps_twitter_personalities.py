import sys
import operator
import requests
import json
import twitter
from ibm_watson import PersonalityInsightsV3 as PersonalityInsights
from ibm_cloud_sdk_core.authenticators import IAMAuthenticator

#open database connection outside of the big for loop
from config import *
mycursor = conn.cursor()

#bring in the list
from mps_list_twitter import *

twitter_consumer_key = ''
twitter_consumer_secret = ''
twitter_access_token = ''
twitter_access_secret = ''

twitter_api = twitter.Api(consumer_key=twitter_consumer_key, consumer_secret=twitter_consumer_secret, access_token_key=twitter_access_token, access_token_secret=twitter_access_secret, tweet_mode='extended')

#start the big for loop
for i in range(0,50): #uncomment bit by bit
#for i in range(50,100):
#for i in range(100,150):
#for i in range(150,200):
#for i in range(200,250):
#for i in range(250,300):
#for i in range(300,350):
#for i in range(350,400):
#for i in range(400,450):
#for i in range(450,500):
#for i in range(500,550):
#for i in range(550,len(mps_list_twitter)):
    twitter_handle = mps_list_twitter[i]
    print(twitter_handle)
    while True:
        try:
            statuses = twitter_api.GetUserTimeline(screen_name=twitter_handle, count=200, include_rts=False)
            break
        except twitter.error.TwitterError:
            print("Error")
            break

    text = ""
    #mynum = 0
    for status in statuses:
        #mynum += 1;
        if (status.lang =='en'):
            data = status.full_text.encode("utf-8")
            text += str(data)
    #print(mynum)

    authenticator = IAMAuthenticator('')
    personality_insights = PersonalityInsights(
        version='2017-10-13',
        authenticator=authenticator
    )

    while True:
        try:
            personality_insights.set_service_url('https://api.eu-gb.personality-insights.watson.cloud.ibm.com/instances/<your instance here>')
            result = str(personality_insights.profile(text, 'application/json'))
            traits = json.loads(result)
            break
        except:
            print("Error")
            break

    #
    #
    #Openness
    #
    #

    openness = traits['result']['personality'][0]
    openness_percentile = openness['percentile']
    openness_percentile = str(round(openness_percentile, 10))
    #print("Openness: " + openness_percentile)

    adventurousness = openness['children'][0]
    adventurousness_percentile = adventurousness['percentile']
    adventurousness_percentile = str(round(adventurousness_percentile, 10))
    #print("Adventurousness: " + adventurousness_percentile)

    artistic_interests = openness['children'][1]
    artistic_interests_percentile = artistic_interests['percentile']
    artistic_interests_percentile = str(round(artistic_interests_percentile, 10))
    #print("Artistic interests: " + artistic_interests_percentile)

    emotionality = openness['children'][2]
    emotionality_percentile = emotionality['percentile']
    emotionality_percentile = str(round(emotionality_percentile, 10))
    #print("Emotionality: " + emotionality_percentile)

    imagination = openness['children'][3]
    imagination_percentile = imagination['percentile']
    imagination_percentile = str(round(imagination_percentile, 10))
    #print("Imagination: " + imagination_percentile)

    intellect = openness['children'][4]
    intellect_percentile = intellect['percentile']
    intellect_percentile = str(round(intellect_percentile, 10))
    #print("Intellect: " + intellect_percentile)

    authority_challenging = openness['children'][5]
    authority_challenging_percentile = authority_challenging['percentile']
    authority_challenging_percentile = str(round(authority_challenging_percentile, 10))
    #print("Authority challenging: " + authority_challenging_percentile)

    #print("")

    #
    #
    #Agreeableness
    #
    #

    agreeableness = traits['result']['personality'][3]
    agreeableness_percentile = agreeableness['percentile']
    agreeableness_percentile = str(round(agreeableness_percentile, 10))
    #print("Agreeableness: " + agreeableness_percentile)

    altruism = agreeableness['children'][0]
    altruism_percentile = altruism['percentile']
    altruism_percentile = str(round(altruism_percentile, 10))
    #print("Altruism: " + altruism_percentile)

    cooperation = agreeableness['children'][1]
    cooperation_percentile = cooperation['percentile']
    cooperation_percentile = str(round(cooperation_percentile, 10))
    #print("Cooperation: " + cooperation_percentile)

    modesty = agreeableness['children'][2]
    modesty_percentile = modesty['percentile']
    modesty_percentile = str(round(modesty_percentile, 10))
    #print("Modesty: " + modesty_percentile)

    morality = agreeableness['children'][3]
    morality_percentile = morality['percentile']
    morality_percentile = str(round(morality_percentile, 10))
    #print("Morality: " + morality_percentile)

    sympathy = agreeableness['children'][4]
    sympathy_percentile = sympathy['percentile']
    sympathy_percentile = str(round(sympathy_percentile, 10))
    #print("Sympathy: " + sympathy_percentile)

    trust = agreeableness['children'][5]
    trust_percentile = trust['percentile']
    trust_percentile = str(round(trust_percentile, 10))
    #print("Trust: " + trust_percentile)

    #print("")

    #
    #
    #Conscientiousness
    #
    #

    conscientiousness = traits['result']['personality'][1]
    conscientiousness_percentile = conscientiousness['percentile']
    conscientiousness_percentile = str(round(conscientiousness_percentile, 10))
    #print("Conscientiousness: " + conscientiousness_percentile)

    achievement_striving = conscientiousness['children'][0]
    achievement_striving_percentile = achievement_striving['percentile']
    achievement_striving_percentile = str(round(achievement_striving_percentile, 10))
    #print("Achievement-striving: " + achievement_striving_percentile)

    cautiousness = conscientiousness['children'][1]
    cautiousness_percentile = cautiousness['percentile']
    cautiousness_percentile = str(round(cautiousness_percentile, 10))
    #print("Cautiousness: " + cautiousness_percentile)

    dutifulness = conscientiousness['children'][2]
    dutifulness_percentile = dutifulness['percentile']
    dutifulness_percentile = str(round(dutifulness_percentile, 10))
    #print("Dutifulness: " + dutifulness_percentile)

    orderliness = conscientiousness['children'][3]
    orderliness_percentile = orderliness['percentile']
    orderliness_percentile = str(round(orderliness_percentile, 10))
    #print("Orderliness: " + orderliness_percentile)

    self_discipline = conscientiousness['children'][4]
    self_discipline_percentile = self_discipline['percentile']
    self_discipline_percentile = str(round(self_discipline_percentile, 10))
    #print("Self-discipline: " + self_discipline_percentile)

    self_efficacy = conscientiousness['children'][5]
    self_efficacy_percentile = self_efficacy['percentile']
    self_efficacy_percentile = str(round(self_efficacy_percentile, 10))
    #print("Self-efficacy: " + self_efficacy_percentile)

    #print("")

    #
    #
    #Extraversion
    #
    #

    extraversion = traits['result']['personality'][2]
    extraversion_percentile = extraversion['percentile']
    extraversion_percentile = str(round(extraversion_percentile, 10))
    #print("Extraversion: " + extraversion_percentile)

    activity_level = extraversion['children'][0]
    activity_level_percentile = activity_level['percentile']
    activity_level_percentile = str(round(activity_level_percentile, 10))
    #print("Activity level: " + activity_level_percentile)

    assertiveness = extraversion['children'][1]
    assertiveness_percentile = assertiveness['percentile']
    assertiveness_percentile = str(round(assertiveness_percentile, 10))
    #print("Assertiveness: " + assertiveness_percentile)

    cheerfulness = extraversion['children'][2]
    cheerfulness_percentile = cheerfulness['percentile']
    cheerfulness_percentile = str(round(cheerfulness_percentile, 10))
    #print("Cheerfulness: " + cheerfulness_percentile)

    excitement_seeking = extraversion['children'][3]
    excitement_seeking_percentile = excitement_seeking['percentile']
    excitement_seeking_percentile = str(round(excitement_seeking_percentile, 10))
    #print("Excitement-seeking: " + excitement_seeking_percentile)

    friendliness = extraversion['children'][4]
    friendliness_percentile = friendliness['percentile']
    friendliness_percentile = str(round(friendliness_percentile, 10))
    #print("Friendliness: " + friendliness_percentile)

    gregariousness = extraversion['children'][5]
    gregariousness_percentile = gregariousness['percentile']
    gregariousness_percentile = str(round(gregariousness_percentile, 10))
    #print("Gregariousness: " + gregariousness_percentile)

    #print("")

    #
    #
    #Neuroticism
    #
    #

    neuroticism = traits['result']['personality'][4]
    neuroticism_percentile = neuroticism['percentile']
    neuroticism_percentile = str(round(neuroticism_percentile, 10))
    #print("Neuroticism: " + neuroticism_percentile)

    anger = neuroticism['children'][0]
    anger_percentile = anger['percentile']
    anger_percentile = str(round(anger_percentile, 10))
    #print("Anger: " + anger_percentile)

    anxiety = neuroticism['children'][1]
    anxiety_percentile = anxiety['percentile']
    anxiety_percentile = str(round(anxiety_percentile, 10))
    #print("Anxiety interests: " + anxiety_percentile)

    depression = neuroticism['children'][2]
    depression_percentile = depression['percentile']
    depression_percentile = str(round(depression_percentile, 10))
    #print("Depression: " + depression_percentile)

    immoderation = neuroticism['children'][3]
    immoderation_percentile = immoderation['percentile']
    immoderation_percentile = str(round(immoderation_percentile, 10))
    #print("Immoderation: " + immoderation_percentile)

    self_consciousness = neuroticism['children'][4]
    self_consciousness_percentile = self_consciousness['percentile']
    self_consciousness_percentile = str(round(self_consciousness_percentile, 10))
    #print("Self-consciousness: " + self_consciousness_percentile)

    vulnerability = neuroticism['children'][5]
    vulnerability_percentile = vulnerability['percentile']
    vulnerability_percentile = str(round(vulnerability_percentile, 10))
    #print("Vulnerability: " + vulnerability_percentile)

    #
    #update the database
    #

    #mycursor.execute ("""
       UPDATE all_mps
       SET openness = %s,
           adventurousness = %s,
           artistic_interests = %s,
           emotionality = %s,
           imagination = %s,
           intellect = %s,
           authority_challenging = %s,

           agreeableness = %s,
           altruism = %s,
           cooperation = %s,
           modesty = %s,
           morality = %s,
           sympathy = %s,
           trust = %s,

           conscientiousness = %s,
           achievement_striving = %s,
           cautiousness = %s,
           dutifulness = %s,
           orderliness = %s,
           self_discipline = %s,
           self_efficacy = %s,

           extraversion = %s,
           activity_level = %s,
           assertiveness = %s,
           cheerfulness = %s,
           excitement_seeking = %s,
           friendliness = %s,
           gregariousness = %s,

           neuroticism = %s,
           anger = %s,
           anxiety = %s,
           depression = %s,
           immoderation = %s,
           self_consciousness = %s,
           vulnerability = %s

       WHERE twitter_handle = %s
    """, (openness_percentile,
          adventurousness_percentile,
          artistic_interests_percentile,
          emotionality_percentile,
          imagination_percentile,
          intellect_percentile,
          authority_challenging_percentile,

          agreeableness_percentile,
          altruism_percentile,
          cooperation_percentile,
          modesty_percentile,
          morality_percentile,
          sympathy_percentile,
          trust_percentile,

          conscientiousness_percentile,
          achievement_striving_percentile,
          cautiousness_percentile,
          dutifulness_percentile,
          orderliness_percentile,
          self_discipline_percentile,
          self_efficacy_percentile,

          extraversion_percentile,
          activity_level_percentile,
          assertiveness_percentile,
          cheerfulness_percentile,
          excitement_seeking_percentile,
          friendliness_percentile,
          gregariousness_percentile,

          neuroticism_percentile,
          anger_percentile,
          anxiety_percentile,
          depression_percentile,
          immoderation_percentile,
          self_consciousness_percentile,
          vulnerability_percentile,

          twitter_handle))

    conn.commit()

conn.close()

print("Your values were updated.")
