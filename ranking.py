from config import *

personality_cols = [["agreeableness", "agreeableness_rank"], ["altruism", "altruism_rank"], ["cooperation", "cooperation_rank"], ["modesty", "modesty_rank"], ["morality", "morality_rank"], ["sympathy", "sympathy_rank"], ["trust", "trust_rank"], ["conscientiousness", "conscientiousness_rank"], ["achievement_striving", "achievement_striving_rank"], ["cautiousness", "cautiousness_rank"], ["dutifulness", "dutifulness_rank"], ["orderliness", "orderliness_rank"], ["self_discipline", "self_discipline_rank"], ["self_efficacy", "self_efficacy_rank"], ["extraversion", "extraversion_rank"], ["activity_level", "activity_level_rank"], ["assertiveness", "assertiveness_rank"], ["cheerfulness", "cheerfulness_rank"], ["excitement_seeking", "excitement_seeking_rank"], ["friendliness", "friendliness_rank"], ["gregariousness", "gregariousness_rank"], ["neuroticism", "neuroticism_rank"], ["anger", "anger_rank"], ["anxiety", "anxiety_rank"], ["depression", "depression_rank"], ["immoderation", "immoderation_rank"], ["self_consciousness", "self_consciousness_rank"], ["vulnerability", "vulnerability_rank"], ["openness", "openness_rank"], ["adventurousness", "adventurousness_rank"], ["artistic_interests", "artistic_interests_rank"], ["emotionality", "emotionality_rank"], ["imagination", "imagination_rank"], ["intellect", "intellect_rank"], ["authority_challenging", "authority_challenging_rank"]]

for item in personality_cols:
    #print(item[0]) #personality
    #print(item[1]) #personality rank

    #get the MP names so you know whose data corresponds to whom
    mycursor = conn.cursor()

    personality_col = item[0]
    #print(item[0])

    sql_str = """SELECT """
    sql_str += "twitter_handle, "
    sql_str += personality_col
    sql_str += """ FROM all_mps """

    mycursor.execute(sql_str)

    myresult = mycursor.fetchall()

    mylist = []
    for column in myresult:
        mylist2 = []
        for num in column:
            mylist2.append(str(num))
        mylist.append(mylist2)
    #print(mylist)

    mylist.sort(key=lambda x: x[1], reverse=True)
    #print(mylist)

    mynum = 0
    for myitem in mylist:
        if myitem[0] != 'no': #don't include MPs that aren't on Twitter
            myitem.append(mynum)
            mynum += 1

    personality_ranking_col = item[1]
    #print(personality_ranking_col)

    myspecialnum = 650 - mylist[649][2] #because 650 MPs
    #print(myspecialnum)
    for i in range(myspecialnum, len(mylist)):
        mylistlen = len(mylist[i])
        if mylistlen != 3: #error handling
            continue
        else:
            #print(mylist[i][2])
            #print(mylist[i][0])

            #insert the rankings into the database
            mycursor = conn.cursor()

            sql_str = """UPDATE all_mps SET """
            sql_str += personality_ranking_col
            sql_str += " = %s"
            sql_str +=  """ WHERE twitter_handle = %s """
            mycursor.execute (sql_str, (mylist[i][2], mylist[i][0]))

            conn.commit()

conn.close()
