var userJsonUrl = '/users/view/';
var skillJsonUrl = '/skills.json';
var skillTreeJsonUrl = '/skills-tree/listTree.json';

var skillTree = {
    availableSkills: ko.observable(),
    treeStructure: ko.observable(),
    userId: '70363db3-80fb-449e-8b5f-1cc590a4bf9a',
    character: {
        userId: ko.observable(),
        name: ko.observable(),
        skills: ko.observable(),
        badges: ko.observable(),
        stats: ko.observable(),
        populateFromJson: function() {
            $.getJSON(userJsonUrl + skillTree.userId + '.json', function(response) {
                userJson = response.user;
                skillTree.character.userId(userJson.id);
                skillTree.character.name(userJson.username);
                skillTree.character.skills(userJson.skills);
                skillTree.character.badges(userJson.badges);
                skillTree.character.stats(userJson.stats);
            });
        },
        achievedRank: function(rankId) {
            for (skillIndex in this.skills()) {
                for (rankIndex in this.skills()[skillIndex].ranks) {
                    id = this.skills()[skillIndex].ranks[rankIndex].id;
                    if (rankId == id) {
                        return 'achieved';
                    }
                }
            };
            return 'notAchieved colorize colorize-border';
        },
        getClass: function(skillId) {
            for (skillIndex in this.skills()) {
                if (skillId == this.skills()[skillIndex].id) {
                    return 'skillDescription achieved';
                }
            };
            return 'skillDescription notAchieved colorize colorize-border';
        }
    },
    populateFromJson: function() {
        $.getJSON(skillJsonUrl, function(response) {
            var skillsList = new Object;
            skillsJson = response.skills;
            for (skillId in skillsJson) {
                skillsList[skillsJson[skillId].id] = skillsJson[skillId];
            }
            skillTree.availableSkills(skillsList);
        });

        $.getJSON(skillTreeJsonUrl, function(response) {
            var skillsTree = new Object;
            skillsTree = response.skillsTree;
            skillTree.treeStructure(skillsTree);
        });
    },
    getURL: function(photo_dir, photo) {
        return "/files/skillstree/photo/" + photo_dir + "/" + photo;
    }
}